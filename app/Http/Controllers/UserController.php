<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Company;
use App\Models\Contact;
use App\Models\Job;
use App\Models\Review;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function getreg(){
        return view('users.register');
    }
    public function register(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'last_name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|min:8|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$/',
        'cpassword' => 'required|same:password',
        'gender' => 'required|in:male,female',
        'img' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        'education' => 'required|string|max:255',
        'category' => 'required|string|max:255',
    ]);

    // Handle image upload
    $filename = 'uploads/user/profile.png'; // Default image
    if ($request->hasFile('img')) {
        $file = $request->file('img');
        $filename = 'uploads/user/' . time() . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('uploads/user'), $filename);
    }

    // Create user
    $user = User::create([
        'name' => $request->name,
        'last_name' => $request->last_name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
        'gender' => $request->gender,
        'img' => $filename,
        'education' => $request->education,
        'category' => $request->category

    ]);


    // Log in the user with the 'user' guard
    Auth::guard('user')->login($user);

    return redirect()->route('users.home');
}


    public function getlogin(){
        return view('users.login');
    }

    public function login(Request $request)
    {
        // Validate the input
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
    
        // Find the user by email
        $user = User::where('email', $request->email)->first();
    
        if ($user) {
            // Check if the user is active
            if ($user->is_active == 'inactive') {
                return back()->withErrors([
                    'email' => 'Your account is inactive. Please contact support.',
                ]);
            }
    
            // Attempt to log in the user
            if (Auth::guard('user')->attempt($request->only('email', 'password'))) {
                $request->session()->regenerate();
                return redirect()->route('users.home');
            }
        }
    
        // If login fails or user doesn't exist
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }
    

public function logout()
{
    Auth::guard('user')->logout();

    
    return redirect()->route('home')->with('success', 'You have successfully logged out.');
}

public function home(Request $request)
{
    $companies = Company::withCount('jobs')->orderByDesc('jobs_count')->limit(6)->get();

    // Get the logged-in user's profile image
    $user = Auth::guard('user')->user();
    $profileImg = $user->img ?? null;

    // Start with the base query for jobs
    $query = Job::with('company')
        ->where('status', 'open') // Only fetch open jobs
        ->orderBy('id', 'desc');

    // Apply search
    if ($request->filled('search')) {
        $search = $request->input('search');
        $query->where(function ($q) use ($search) {
            $q->where('title', 'like', '%' . $search . '%')
              ->orWhere('description', 'like', '%' . $search . '%');
        });
    }

    // Apply filters
    if ($request->filled('category')) {
        $query->where('category', $request->input('category'));
    }

    if ($request->filled('type')) {
        $query->where('type', $request->input('type'));
    }

    if ($request->filled('location')) {
        $query->where('location', 'like', '%' . $request->input('location') . '%');
    }

    if ($request->filled('min_salary') && $request->filled('max_salary')) {
        $query->whereBetween('salary', [$request->input('min_salary'), $request->input('max_salary')]);
    }

    // Paginate the results
    $jobs = $query->paginate(6);

    // Total jobs per category
    $totalJobs = Job::select('category', DB::raw('COUNT(*) as total'))
        ->groupBy('category')
        ->orderBy('total', 'desc')
        ->limit(6)
        ->get();

    return view('users.home', compact('companies','user', 'jobs', 'totalJobs', 'profileImg'));
}


public function about(){
    $user = Auth::guard('user')->user();
    $profileImg = $user->img ?? null;
    return view('users.about',compact('profileImg'));
}
public function contact(){
    $user=Auth::guard('user')->user();
    $profileImg = $user->img ?? null;

    return view('users.contact' ,compact('profileImg'));
}

public function postContact(Request $request){
    $request->validate([
        'name' => 'required|max:255',
        'email' => 'required|email|max:255',
        'subject' => 'required|max:255',
        'message' => 'required|min:10',
    ]);

    // Save the contact form data to the database
    $contact = new Contact();
    $contact->name = $request->name;
    $contact->email = $request->email;
    $contact->subject = $request->subject;
    $contact->message = $request->message;
    $contact->save();

    // Return back with a success message
    return redirect()->back()->with('success', 'Your message has been sent successfully! Thank you for contacting us.');
}
public function job(Request $request)
{
    $user = Auth::guard('user')->user();
    $profileImg = $user->img ?? null;

    // Get query parameters from the request
    $search = $request->input('search');
    $category = $request->input('category');
    $type = $request->input('type');
    $location = $request->input('location');
    $minSalary = $request->input('min_salary');
    $maxSalary = $request->input('max_salary');

    // Start with the base query
    $jobs = Job::with('company') // Eager load the related company data
        ->where('status', 'open') // Only fetch open jobs
        ->orderBy('id', 'desc');

    // Apply filters dynamically
    if ($search) {
        $jobs->where(function ($query) use ($search) {
            $query->where('title', 'like', '%' . $search . '%')
                  ->orWhere('description', 'like', '%' . $search . '%');
        });
    }

    if ($category) {
        $jobs->where('category', $category);
    }

    if ($type) {
        $jobs->where('type', $type);
    }

    if ($location) {
        $jobs->where('location', 'like', '%' . $location . '%');
    }

    if ($minSalary) {
        $jobs->where('salary', '>=', $minSalary);
    }

    if ($maxSalary) {
        $jobs->where('salary', '<=', $maxSalary);
    }

    // Paginate the filtered results
    $jobs = $jobs->paginate(6);

    // Check if it's an AJAX request
    if ($request->ajax()) {
        return view('partials.job-list', compact('jobs'))->render();
    }

    return view('users.jobs', compact('jobs', 'profileImg'));
}

public function jobProfile(int $id){
  $job=Job::where('id','=',$id)->with('company')->first();
  $user = Auth::guard('user')->user();
  $profileImg = $user->img ?? null;
  return view('users.jobProfile',compact('job','profileImg'));
}

public function profile(){
    $user = Auth::guard('user')->user();
    $profileImg = $user->img ?? null;
    $user=User::where('id','=',$user->id)->with(['reviews','applications'])->first();
    // dd($user);

    return view('users.profile',compact('user','profileImg'));    
}

public function deleteProfile(){
    $user = Auth::guard('user')->user();
    $user->delete();
    return redirect('/users/home');
}

public function updateProfile(Request $request)
{
    $user = Auth::guard('user')->user();

    $validate = $request->validate([
        'name' => 'required|string|max:255',
        'last_name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email,' . $user->id,
        'password' => 'nullable|min:8|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$/',
        'cpassword' => 'nullable|same:password',
        'phone_number' => 'required',
        'bio' => 'required',
        'category' => 'required|string|max:255',
        'cv'=>'nullable',
        'country'=>'nullable',
        'experince'=>'nullable',
    ]);

    $filename = $user->img;

    // Handle profile image upload
    if ($request->hasFile('img')) {
        $file = $request->file('img');
        $filename = 'uploads/user/' . time() . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('uploads/user'), $filename);
    }

    // Update user information
    $user->name = $request->name;
    $user->last_name = $request->last_name;
    $user->email = $request->email;
    $user->img = $filename;
    $user->phone_number = $request->phone_number;
    $user->bio = $request->bio;
    $user->category = $request->category;
    $user->cv = $request->cv;
    $user->country = $request->country;
    $user->experince = $request->experince;

    // Update password only if provided
    if ($request->filled('password')) {
        $user->password = bcrypt($request->password);
    }

    $user->save();

    return redirect('/users/profile')->with('success', 'Profile updated successfully!');
}
public function company(Request $request)
{
    $user = Auth::guard('user')->user();
    $profileImg = $user->img ?? null;

    // Build the query for filtering and searching
    $query = Company::query();

    // Apply category filter
    if ($request->filled('category')) {
        $query->where('category', $request->category);
    }

    // Apply address filter
    if ($request->filled('address')) {
        $query->where('address', 'like', '%' . $request->address . '%');
    }

    // Apply search filter
    if ($request->filled('search')) {
        $search = $request->search;
        $query->where(function ($q) use ($search) {
            $q->where('name', 'like', '%' . $search . '%')
              ->orWhere('category', 'like', '%' . $search . '%')
              ->orWhere('address', 'like', '%' . $search . '%')
              ->orWhere('email', 'like', '%' . $search . '%');
        });
    }

    // Paginate the filtered results
    $companies = $query->paginate(6);

    // Pass the categories for the dropdown
    $categories = [
        'IT', 'Finance', 'Healthcare', 'Education', 'Retail', 'Manufacturing',
        'Construction', 'Real Estate', 'Transportation', 'Hospitality',
        'Agriculture', 'Energy', 'Telecommunications', 'Media', 'Entertainment',
        'Legal', 'Consulting', 'Nonprofit', 'Government', 'Automotive',
        'Aerospace', 'Fashion', 'Food and Beverage', 'Pharmaceuticals',
        'Insurance', 'Other'
    ];

    return view('users.company', compact('profileImg', 'companies', 'categories'));
}


public function companyProfile($id){
    $user=Auth::guard('user')->user();
    $company = Company::where('id', '=', $id)->with('jobs')->first();

    $profileImg = $user->img ?? null;


    $reviews = Review::where('company_id', '=', $id)->orderBy('id', 'desc') 
                             ->with('users') // Load the user who wrote the review
                             ->get();

            $averageRating = Review::where('company_id', '=', $id)->avg('rating');
            
            $totalReviews = $reviews->count();

    // Paginate jobs: Fetch 6 jobs per page
    $jobs =Job::where('company_id', '=', $id)->orderBy('id', 'desc')->paginate(6);

    // If it's an AJAX request, return the jobs as JSON
    
    

  

    return view('users.companyProfile',compact('company','profileImg','jobs', 'profileImg', 'reviews', 'averageRating', 'totalReviews'));
}


public function storeReview(Request $request)
{
    $request->validate([
        'company_id' => 'required|exists:companies,id',
        'rating' => 'required|integer|min:1|max:5',
        'comment' => 'nullable|string|max:1000',
    ]);

    $user = Auth::guard('user')->user();

    // Check if the user already reviewed the company
    $existingReview = Review::where('company_id', $request->company_id)
                            ->where('user_id', $user->id)
                            ->first();

    if ($existingReview) {
        return back()->with('error', 'You have already reviewed this company.');
    }

    // Create the new review
    Review::create([
        'user_id' => $user->id,
        'company_id' => $request->company_id,
        'rating' => $request->rating,
        'comment' => $request->comment,
    ]);

    return back()->with('success', 'Your review has been added.');
}

public function apply($jobId)
{
    // Get the authenticated user
    $user = Auth::guard('user')->user();

    // Check if the user has already applied for this job
    $alreadyApplied = Application::where('user_id', $user->id)
        ->where('job_id', $jobId)
        ->exists();

    if ($alreadyApplied) {
        return redirect()->back()->with('error', 'You have already applied for this job.');
    }

    // Create the application record
    Application::create([
        'user_id' => $user->id,
        'job_id' => $jobId,
        'application_date' => now(),
    ]);

    return redirect()->back()->with('success', 'You have successfully applied for the job.');
}

public function deleteApplication(int $id){
    $application = Application::findOrFail($id);

    // Ensure the authenticated user owns the application
    if ($application->user_id !== Auth::id()) {
        return redirect()->back()->with('error', 'Unauthorized action.');
    }

    // Delete the application
    $application->delete();

    return redirect()->back()->with('success', 'Application successfully withdrawn.');

}
}
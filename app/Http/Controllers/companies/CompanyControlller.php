<?php

namespace App\Http\Controllers\companies;

use App\Http\Controllers\Controller;
use App\Models\Application;
use App\Models\Company;
use App\Models\Contact;
use App\Models\Job;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CompanyControlller extends Controller
{
    public function CompanyReg()
    {
        return view('companies.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required|min:8|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$/',
            'cpassword' => 'required|same:password',
            'category' => 'required',
            'address' => 'required',
        ]);

        $company = new Company();
        $company->name = $request->name;
        $company->email = $request->email;
        $company->password = bcrypt($request->password);
        $company->category = $request->category;
        $company->address = $request->address;
        $company->save();
        return view('companies.home');
    }

    public function CompanyLog()
    {
        return view('companies.login');
    }
    public function login(Request $request)
    {
        // Validate the request data
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        // Attempt to authenticate using the company guard
        if (Auth::guard('company')->attempt($request->only('email', 'password'))) {
            // Authentication successful, redirect to the company dashboard
            return redirect()->route('company.home')->with('success', 'Logged in successfully!');
        }

        // Authentication failed
        return back()->withErrors(['email' => 'Invalid email or password'])->withInput();
    }

    public function logout()
    {
        Auth::guard('company')->logout();
        return redirect()->route('home')->with('message', 'Logged out successfully.');
    }


    public function about()
    {
        $company = Auth::guard('company')->user();
        $profileImg = $company->img ?? null;
        return view('companies.about', compact('profileImg'));
    }

    public function contact()
    {
        $company = Auth::guard('company')->user();
        $profileImg = $company->img ?? null;

        return view('companies.contact', compact('profileImg'));
    }

    public function postContact(Request $request)
    {
        // Validation rules
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






    public function home(Request $request)
    {
        $companies = Company::withCount('jobs')->orderByDesc('jobs_count')->limit(6)->get();
        $query = Job::with('company');

        // Get the logged-in company's profile image
        $company = Auth::guard('company')->user();
        $profileImg = $company->img ?? null;

        $comJobs = Auth::guard('company')->user()->jobs;

        // Filters
        if ($request->filled('category')) {
            $query->where('category', $request->category);
        }

        if ($request->filled('type')) {
            $query->where('type', $request->type);
        }

        if ($request->filled('location')) {
            $query->where('location', $request->location);
        }

        if ($request->filled('min_salary') && $request->filled('max_salary')) {
            $query->whereBetween('salary', [$request->min_salary, $request->max_salary]);
        }

        $jobs = $query->orderBy('id', 'desc')->paginate(6);

        // Total Jobs per Category
        $totalJobs = Job::select('category', DB::raw('COUNT(*) as total'))
            ->groupBy('category')
            ->orderBy('total', 'desc')
            ->limit(6)
            ->get();

        // Pass the necessary data to the view
        return view('companies.home', compact('companies', 'jobs', 'totalJobs', 'profileImg', 'comJobs'));
    }

    public function profile(Request $request)
    {
        $id = Auth::guard('company')->user()->id;
        $company = Company::where('id', '=', $id)->with('jobs')->first();
        $comJobs = Auth::guard('company')->user()->jobs;
        $profileImg = $company->img ?? null;

        // Paginate jobs: Fetch 6 jobs per page
        $jobs = Auth::guard('company')->user()->jobs()->orderBy('id', 'desc')->paginate(6);

        // If it's an AJAX request, return the jobs as JSON
        if ($request->ajax()) {
            return response()->json([
                'jobs' => $jobs->items(),
                'hasMorePages' => $jobs->hasMorePages(),
                'nextPage' => $jobs->currentPage() + 1,
            ]);
        }

        return view('companies.profile', compact('company', 'comJobs', 'profileImg', 'jobs'));
    }




    public function UpdateProfile(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required',
            'email' => 'required|email|max:255|unique:users,email,' . $request->id,
            'img' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'address' => 'required|string|max:255',
            'business_license' => 'required|string|max:255',
            'password' => 'nullable|min:8|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$/',
            'cpassword' => 'nullable|same:password',
            'bio'=> 'required|string',

        ]);

        $company = Company::where('id', '=', $request->id)->first();

        if ($request->hasFile('img')) {
            // Delete the old image if it exists and is not the default profile picture
            if ($company->img && $company->img !== 'profile.png' && file_exists(public_path('uploads/company/' . $company->img))) {
                unlink(public_path('uploads/company/' . $company->img));
            }

            // Upload the new image
            $file = $request->file('img');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/company'), $filename);

            // Assign the new image filename to the user
            $company->img = 'uploads/company/' . $filename;
        } elseif (!$company->img) {
            // If no image uploaded and no existing image, assign default profile picture
            $company->img = 'uploads/company/profile.png';
        }

        $company->name = $request->name;
        $company->category = $request->category;
        $company->email = $request->email;
        $company->address = $request->address;
        $company->business_license = $request->business_license;
        $company->password = bcrypt($request->password);
        $company->bio = $request->bio;
        if ($company->subscription_id != null) {
            $company->subscription_status = 'premium';
        }
        $company->save();
        return redirect()->route('company.profile')
            ->with('success', 'company updated successfully.');
    }

    public function deleteProfile(int $id){
        $company=Company::where('id','=',$id)->first();
         $company->is_active='Inactive';
         $company->save(); 
         $company->delete();
         return redirect()->route('home')
        ->with('success', 'company updated successfully.');
    }

    public function addPost(Request $request){

        $request->validate([
            'title'=>'required',
            'company_id'=>'required',
            'description'=>'required',
            'type'=>'required',
            'location'=>'required',
            'salary'=>'required',
            'duration'=>'required',
            'status'=>'required',
            'category'=>'required',
        ]);

        $job=new Job();
        $job->company_id=$request->company_id;
        $job->title=$request->title;
        $job->description=$request->description;
        $job->type=$request->type;
        $job->location=$request->location;
        $job->salary=$request->salary;
        $job->duration=$request->duration;
        $job->status=$request->status;
        $job->category=$request->category;
        $job->save();
        return redirect()->back()
        ->with('success', 'job added successfully.');
    }

    public function editPost(int $id){
        $job=Job::where('id','=',$id)->with('company')->first();
        $company = Auth::guard('company')->user();
        $profileImg = $company->img ?? null;

        return view('companies.editpost',compact('job','profileImg'));
    }

    public function updatePost(Request $request,int $id){
        $request->validate([
            'title'=>'required',
            'company_id'=>'required',
            'description'=>'required',
            'type'=>'required',
            'location'=>'required',
            'salary'=>'required',
            'duration'=>'required',
            'status'=>'required',
            'category'=>'required',
        ]);

        $job=Job::where('id','=',$id)->first();
        $job->company_id=$request->company_id;
        $job->title=$request->title;
        $job->description=$request->description;
        $job->type=$request->type;
        $job->location=$request->location;
        $job->salary=$request->salary;
        $job->duration=$request->duration;
        $job->status=$request->status;
        $job->category=$request->category;
        $job->save();
        return redirect()->route('company.profile')
        ->with('success', 'job updated successfully.');
    }

    public function deletePost(int $id){
        $job=Job::where('id','=',$id)->first();
        $job->delete();
        return redirect()->route('company.profile')
        ->with('success', 'job deleted successfully.');
    }

    public function applications(int $id){
        $company = Auth::guard('company')->user();
        $profileImg = $company->img ?? null;
        $applications=Application::where('job_id','=',$id)->with('jobs','users')->orderBy('id','ASC')->get();
        return view('companies.applications',compact('applications','profileImg'));
    }

    public function userProfile(int $id){
        $company = Auth::guard('company')->user();
        $profileImg = $company->img ?? null;
        $user=User::where('id','=',$id)->first();
        return view('companies.userprofile',compact('user','profileImg'));    
    }
        
    
    
}

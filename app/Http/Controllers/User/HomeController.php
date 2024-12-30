<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\Contact;
use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
     public function home(Request $request)
     {
         $companies = Company::withCount('jobs')->orderByDesc('jobs_count')->limit(6)->get();
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
 
     
         return view('welcome', compact('companies', 'jobs', 'totalJobs'));
     }

     public function about(){
          return view('about');
     }

     public function contact(){
          return view('contact');
     }

     public function postContact(Request $request) {
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

      public function job(Request $request)
      {
          // Get query parameters from the request
          $search = $request->input('search');
          $category = $request->input('category');
          $type = $request->input('type');
          $location = $request->input('location');
          $minSalary = $request->input('min_salary');
          $maxSalary = $request->input('max_salary');
      
          // Start with the base query
          $jobs = Job::with('company') // Eager load the related company data
              ->where('status', 'open')->orderBy('id', 'desc'); // Only fetch open jobs
      
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
      
          // For normal page load, return the full view
          return view('jobs.job', compact('jobs'));
      }
      






      public function jobProfile(int $id){
          $job=Job::where('id','=',$id)->first();
          return view('jobs.jobProfile',compact('job'));  
      }

      public function logCard(){
          return view('logCard');
      }

      public function regCard(){
          return view('regCard');
      }
      


     
}

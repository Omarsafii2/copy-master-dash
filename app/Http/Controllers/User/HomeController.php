<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
     public function home(Request $request)
     {
         $companies = Company::withCount('jobs')->orderByDesc('jobs_count')->limit(6)->get();
         $query = Job::with('company');
     
        
     
         // Filter by Category
         if ($request->filled('category')) {
             $query->where('category', $request->category);
         }
     
         // Filter by Job Type
         if ($request->filled('type')) {
             $query->where('type', $request->type);
         }
     
         // Filter by Location
         if ($request->filled('location')) {
             $query->where('location', $request->location);
         }
     
         // Filter by Salary Range
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
     
         return view('welcome', compact('companies', 'jobs', 'totalJobs'));
     }
     
}

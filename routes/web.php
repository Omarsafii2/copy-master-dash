<?php

use App\Http\Controllers\companies\CompanyControlller;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\User\HomeController;
use App\Http\Controllers\UserController;
use App\Models\Company;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::controller(HomeController::class)->group(function () {
    Route::get('/', 'home')->name('home');
    Route::get('/about', 'about')->name('about');
    Route::get('/contact', 'contact')->name('contact');
    Route::post('/contact', 'postContact')->name('contactpost');
    Route::get('/jobs/job','job')->name('jobs.job');
    Route::get('/jobs/{id}/jobProfile', 'jobProfile')->name('jobs.jobProfile');
    Route::get('/logCard', 'logCard')->name('logCard');
    Route::get('/regCard', 'regCard')->name('regCard');
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::controller(AdminController::class)->group(function () {
    Route::get('/admin', 'login')->name('admin.login');
    Route::post('/loginpost', 'loginpost')->name('admin.loginpost');
   
    Route::middleware('auth:admin')->group(function () {
        Route::get('/admin/super', 'index')->name('admin.super');
        Route::get('admin/index', 'index')->name('admin.index');
        Route::get('/admin/logout', 'logout')->name('admin.logout');

        Route::get('/admin/manage','manage')->name('admin.manage');
        Route::post('/admin/addadmin','AdminStore')->name('admin.addadmin');
        Route::get('admin/{id}/adminprofile','AdminProfile')->name('admin.adminprofile');
        Route::patch('/admin/editadmin','AdminUpdate')->name('admin.editadmin');
        Route::delete('admin/admin/{id}', 'AdminDelete')->name('admin.admindelete');


        Route::get('/admin/user', 'UserIndex')->name('admin.user');
        Route::post('/admin/add','UserStore')->name('admin.add');
        Route::get('admin/{id}/userprofile','UserProfile')->name('admin.userprofile');
        Route::patch('/admin/edit','UserUpdate')->name('admin.edit');
        Route::delete('/admin/user/{id}', 'UserDelete')->name('admin.userdelete');


        Route::get('/admin/company','CompanyIndex')->name('admin.company');
        Route::post('/admin/addcompany','CompanyStore')->name('admin.addcompany');
        Route::get('admin/{id}/companyprofile','CompanyProfile')->name('admin.companyprofile');
        Route::patch('/admin/editcompany','CompanyUpdate')->name('admin.editcompany');
        Route::delete('/admin/company/{id}', 'CompanyDelete')->name('admin.companydelete');
        Route::get('/admin/{id}/companyjob','CompanyJob')->name('admin.companyjob');

        Route::get('/admin/job','jobIndex')->name('admin.job');
        Route::post('/admin/addjob','JobStore')->name('admin.addjob');
        Route::get('admin/{id}/jobview','JobView')->name('admin.jobview');
        Route::patch('/admin/editjob','JobUpdate')->name('admin.editjob');
        Route::delete('/admin/job/{id}', 'JobDelete')->name('admin.jobdelete');

        Route::delete('admin/review/{id}', 'ReviewDelete')->name('admin.reviewdelete');

        Route::get('/admin/subsicriptions','SubscriptionsIndex')->name('admin.subscription');
        Route::post('/admin/addsubscription','SubscriptionStore')->name('admin.addsubscription');
        Route::get('admin/{id}/subscriptionview','SubscriptionView')->name('admin.subscriptionView');
        Route::delete('/admin/subscription/{id}', 'SubscriptionDelete')->name('admin.subscriptiondelete');

        Route::get('/admin/contact','ContactIndex')->name('admin.contact');
        Route::get('admin/{id}/contactview','ContactView')->name('admin.contactview');
        Route::post('/contact/{id}/reply',  'replyContact')->name('admin.contact.reply');

    }); 
        });

 Route::controller(CompanyControlller::class)->group(function () {
       Route::get('/CompanyReg', 'CompanyReg')->name('CompanyReg');
       Route::post('/company/register', 'register')->name('CompanyRegPost');
       Route::get('/CompanyLog', 'CompanyLog')->name('CompanyLog');
       Route::post('/company/login', 'login')->name('CompanyLogPost');

       Route::middleware('auth:company')->group(function () {
           Route::get('/company/home', 'home')->name('company.home');
           Route::get('/company/about', 'about')->name('company.about');
           Route::get('/company/contact', 'contact')->name('company.contact');
           Route::post('/company/contact', 'postContact')->name('company.contactpost');
           Route::get('/company/logout', 'logout')->name('company.logout');
           Route::get('/company/profile', 'profile')->name('company.profile');
           Route::put('/company/edit', 'UpdateProfile')->name('company.edit');
           Route::delete('/company/delete/{id}', 'deleteProfile')->name('company.delete');
           Route::post('/company/addPost','addPost')->name('company.post');
           Route::get('/company/editPost/{id}','editPost')->name('company.editpost');
           Route::put('/company/updatePost/{id}','updatePost')->name('company.updatepost');
           Route::delete('/company/deletePost/{id}','deletePost')->name('company.deletepost');
           Route::get('/company/applications/{id}','applications')->name('company.applications');
           Route::get('/company/userProfile/{id}','UserProfile')->name('company.userprofile');
           Route::post('/company/subscribe','subscribe')->name('company.subscribe');
           Route::get('/company/job','job')->name('company.job');
           Route::get('/company/jobProfile/{id}','jobProfile')->name('company.jobProfile');


       });

       
       
 });

 Route::controller(UserController::class)->group(function () {
    Route::get('/user/register', 'getreg')->name('user.getreg');
    Route::post('/user/register', 'register')->name('user.register');
    Route::get('/user/login', 'getlogin')->name('user.getlogin');
    Route::post('/user/login', 'login')->name('user.login');

    Route::middleware('auth:user')->group(function () {
        Route::get('users/home','home')->name('users.home');
        Route::get('/user/logout', 'logout')->name('user.logout');
        Route::get('users/about','about')->name('users.about');
        Route::get('users/contact','contact')->name('users.contact');
        Route::post('/user/contact', 'postContact')->name('user.contactpost');
        Route::get('/users/job','job')->name('users.job');
        Route::get('/users/jobProfile/{id}','jobProfile')->name('users.jobProfile');
        Route::get('/users/profile', 'profile')->name('users.profile');
        Route::delete('/users/delete', 'deleteProfile')->name('users.delete');
        Route::put('/users/edit','updateProfile')->name('users.edit');
        Route::get('/users/company','company')->name('users.company');
        Route::get('/users/companyProfile/{id}','companyProfile')->name('users.companyProfile');
        Route::post('/users/reviews','storeReview')->name('users.reviews');
        Route::get('/users/applay/{id}','apply')->name('users.applay');
        Route::delete('/users/application/{id}','deleteApplication')->name('users.deleteApplication');
    });
     
 });



require __DIR__.'/auth.php';

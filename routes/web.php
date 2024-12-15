<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;


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

Route::get('/', function () {
    return view('welcome');
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


        Route::get('admin/company','CompanyIndex')->name('admin.company');
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



require __DIR__.'/auth.php';

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ChartController;
use App\Http\Controllers\Admin\LogoutController;
use App\Http\Controllers\Admin\ClientReviewController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\CoursesController;
use App\Http\Controllers\Admin\FooterController;
use App\Http\Controllers\Admin\HomePageEtcController;
use App\Http\Controllers\Admin\InformationController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\ServiceController;


Route::get('/', function () {
    return view('welcome');
});

 
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.index');
    })->name('dashboard');
});

 // Logout All Route
    Route::controller(LogoutController::class)->group(function () {
    Route::get('/logout/all', 'destroy')->name('logout.all');
 });

 // Charts All Route
 Route::controller(ChartController::class)->group(function () {
    Route::get('/chart/all', 'ChartAll')->name('chart.all');
    Route::get('/chart/add', 'ChartAdd')->name('chart.add');
    Route::post('/chart/store', 'ChartStore')->name('chart.store');
    Route::get('/chart/edit/{id}', 'ChartEdit')->name('chart.edit');
    Route::post('/chart/update', 'ChartUpdate')->name('chart.update');
    Route::get('/chart/delete/{id}', 'ChartDelete')->name('chart.delete');
 });

// Client Review All Route
Route::controller(ClientReviewController::class)->group(function () {
    Route::get('/client/all', 'ClientAll')->name('client.all');
    Route::get('/client/add', 'ClientAdd')->name('client.add');
    Route::post('/client/store', 'ClientStore')->name('client.store');
    Route::get('/client/edit/{id}', 'ClientEdit')->name('client.edit');
    Route::post('/client/update', 'ClientUpdate')->name('client.update');
    Route::get('/client/delete/{id}', 'ClientDelete')->name('client.delete');
 });

 // Contact All Route
Route::controller(ContactController::class)->group(function () {
    Route::get('/contact/all', 'ContactAll')->name('contact.all');
    Route::get('/contact/add', 'ContactAdd')->name('contact.add');
    Route::post('/contact/store', 'ContactStore')->name('contact.store');
    Route::get('/contact/edit/{id}', 'ContactEdit')->name('contact.edit');
    Route::post('/contact/update', 'ContactUpdate')->name('contact.update');
    Route::get('/contact/delete/{id}', 'ContactDelete')->name('contact.delete');
 });


 // Courses All Route
Route::controller( CoursesController::class)->group(function () {
    Route::get('/courses/all', 'CoursesAll')->name('courses.all');
    Route::get('/courses/add', 'CoursesAdd')->name('courses.add');
    Route::post('/courses/store', 'CoursesStore')->name('courses.store');
    Route::get('/courses/edit/{id}', 'CoursesEdit')->name('courses.edit');
    Route::post('/courses/update', 'CoursesUpdate')->name('courses.update');
    Route::get('/courses/delete/{id}', 'CoursesDelete')->name('courses.delete');
 });

 // FOOTER All Route
Route::controller( FooterController::class)->group(function () {
    Route::get('/footer/all', 'FooterAll')->name('footer.all');
    Route::get('/footer/add', 'FooterAdd')->name('footer.add');
    Route::post('/footer/store', 'FooterStore')->name('footer.store');
    Route::get('/footer/edit/{id}', 'FooterEdit')->name('footer.edit');
    Route::post('/footer/update', 'FooterUpdate')->name('footer.update');
    Route::get('/footer/delete/{id}', 'FooterDelete')->name('footer.delete');
 });

// HOMEPAGEETC All Route
Route::controller( HomePageEtcController::class)->group(function () {
    Route::get('/homepage/all', 'HomePageAll')->name('homepage.all');
    Route::get('/homepage/add', 'HomePageAdd')->name('homepage.add');
    Route::post('/homepage/store', 'HomePageStore')->name('homepage.store');
    Route::get('/homepage/edit/{id}', 'HomePageEdit')->name('homepage.edit');
    Route::post('/homepage/update', 'HomePageUpdate')->name('homepage.update');
    Route::get('/homepage/delete/{id}', 'HomePageDelete')->name('homepage.delete');
 });


  // INFORMATION All Route
Route::controller( InformationController::class)->group(function () {
    Route::get('/information/all', 'InformationAll')->name('information.all');
    Route::get('/information/add', 'InformationAdd')->name('information.add');
    Route::post('/information/store', 'InformationStore')->name('information.store');
    Route::get('/information/edit/{id}', 'InformationEdit')->name('information.edit');
    Route::post('/information/update', 'InformationUpdate')->name('information.update');
    Route::get('/information/delete/{id}', 'InformationDelete')->name('information.delete');
 });

 // Projects All Route
Route::controller( ProjectController::class)->group(function () {
    Route::get('/project/all', 'ProjectAll')->name('project.all');
    Route::get('/project/add', 'ProjectAdd')->name('project.add');
    Route::post('/project/store', 'ProjectStore')->name('project.store');
    Route::get('/project/edit/{id}', 'ProjectEdit')->name('project.edit');
    Route::post('/project/update', 'ProjectUpdate')->name('project.update');
    Route::get('/project/delete/{id}', 'ProjectDelete')->name('project.delete');
 });

 // Services All Route
Route::controller( ServiceController::class)->group(function () {
    Route::get('/service/all', 'ServiceAll')->name('service.all');
    Route::get('/service/add', 'ServiceAdd')->name('service.add');
    Route::post('/service/store', 'ServiceStore')->name('service.store');
    Route::get('/service/edit/{id}', 'ServiceEdit')->name('service.edit');
    Route::post('/service/update', 'ServiceUpdate')->name('service.update');
    Route::get('/service/delete/{id}', 'ServiceDelete')->name('service.delete');
 });
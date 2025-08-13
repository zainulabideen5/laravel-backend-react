<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ChartController;
use App\Http\Controllers\Admin\ClientReviewController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\CoursesController;
use App\Http\Controllers\Admin\FooterController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\HomePageEtcController;
use App\Http\Controllers\Admin\InformationController;
use App\Http\Controllers\Admin\ServiceController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// chat route.
 Route::get('/chartdata',[ChartController::class,'onAllSelect']);

// client review route.
Route::get('/clientreview',[ClientReviewController::class,'onAllSelect']);

// contact route.
Route::post('/contactsend',[ContactController::class,'onContactSend']);

// video all route.
Route::get('/coursehome',[CoursesController::class,'onSelectFour']);
Route::get('/courseall',[CoursesController::class,'onAllSelect']);
Route::get('/coursedetails/{courseId}',[CoursesController::class,'onSelectDetails']);

// footer route.
Route::get('/footerdata',[FooterController::class,'onAllSelect']);

// information route.
Route::get('/information',[InformationController::class,'onAllSelect']);

// services route.
Route::get('/services',[ServiceController::class,'ServiceView']);

// project all route.

Route::get('/projecthome',[ProjectController::class,'onSelectThree']);
Route::get('/projectall',[ProjectController::class,'onAllSelect']);

Route::get('/projectdetails/{projectId}',[ProjectController::class,'ProjectDetails']);

// home etc all route.
Route::get('/home/video',[HomePageEtcController::class,'SelectVideo']);
Route::get('/totalhome', [HomePageEtcController::class, 'SelectTotalHome']);
Route::get('/techhome', [HomePageEtcController::class, 'SelectTechHome']);
Route::get('/homepage/title', [HomePageEtcController::class, 'SelectHomeTitle']);



Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

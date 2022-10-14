<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
//use Illuminate\Controllers\Auth;

use App\Http\Controllers\ConsignmentController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DriverController;
use App\Http\Controllers\FleetController;
use App\Http\Controllers\TripController;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\Auth\LoginController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
use App\Http\Controllers\Auth\LogoutController;


*/

// the route will go to the index page / the login page
Route::get('/', [LoginController::class, 'showLoginForm'])->name('login');

// direct users to the dashboard after a succefull login(am still to unserstand this)
//Route::get('/dashboard', function () { return view('pages.dashboard'); })->middleware(['auth'])->name('dashboard');
Route::get('/dashboard',[App\Http\Controllers\DashboardController::class, 'index']);

Auth::routes();


Route::get('/consignments/closedConsigments/',[ConsignmentController::class, 'closedConsigments']);
Route::get('/consignments/{id}/consignmentrecieved/',[ConsignmentController::class, 'consignmentrecieved']);
Route::put('/consignments/{id}/accrecievedconsignment/',[ConsignmentController::class, 'accrecievedconsignment']);
Route::get('/consignments/{id}/close/',[ConsignmentController::class, 'close']);
Route::put('/consignments/{id}/closecon/',[ConsignmentController::class, 'closecon']);

Route::resource('/consignments',ConsignmentController::class);
Route::resource('/users',UserController::class);
Route::resource('/drivers',DriverController::class);
Route::resource('/fleet',FleetController::class);
Route::resource('/trip',TripController::class);

Route::get('/search', [ConsignmentController::class,'search']);
Route::get('/trip/{id}/closetrip',[TripController::class, 'closetrip']);
Route::put('/trip/{id}/tripend/',[TripController::class, 'tripend']);


Route::get('/trip/{consingmentno}/create/',[TripController::class, 'create']);



Route::get('/drivers/{id}/delete/',[DriverController::class, 'delete']);
Route::get('/drivers/{id}/driverperfomance/',[DriverController::class, 'driverperformance']);

Route::get('create-pdf-file', [PDFController::class, 'pdfindex']);
<?php
use App\Http\Controllers\ConsignmentController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DriverController;
use App\Http\Controllers\FleetController;
use App\Http\Controllers\TripController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// the route will go to the index page / the login page
Route::get('/', [App\Http\Controllers\Auth\LoginController::class, 'showLoginForm'])->name('login');

// direct users to the dashboard after a succefull login(am still to unserstand this)
Route::get('/dashboard', function () { 
    return view('pages.dashboard'); 
   })->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

/**  start Consignments Routes  **/
Route::get('/consignments/closedConsigments/',[App\Http\Controllers\ConsignmentController::class, 'closedConsigments']);
Route::get('/consignments/{id}/consignmentrecieved/',[App\Http\Controllers\ConsignmentController::class, 'consignmentrecieved']);
Route::get('/consignments/{id}/close/',[App\Http\Controllers\ConsignmentController::class, 'close']);
Route::put('/consignments/{id}/closecon/',[App\Http\Controllers\ConsignmentController::class, 'closecon']);
Route::resource('/consignments',ConsignmentController::class);

Route::resource('/users',UserController::class);
Route::resource('/drivers',DriverController::class);
Route::resource('/fleet',FleetController::class);
Route::resource('/trip',TripController::class);

Route::get('/search', [ConsignmentController::class,'search']);
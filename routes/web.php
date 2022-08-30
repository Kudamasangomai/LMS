<?php
use app\Http\Controllers\LoginController;
use app\Http\Controllers\HomeController;
use App\Http\Controllers\ConsignmentController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DriverController;
use App\Http\Controllers\FleetController;
use App\Http\Controllers\TripController;
use App\Http\Controllers\PDFController;
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
Route::get('/dashboard', function () { return view('pages.dashboard'); })->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

/**  start Consignments Routes  **/
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





Route::get('/drivers/{id}/delete/',[DriverController::class, 'delete']);

Route::get('create-pdf-file', [PDFController::class, 'index']);
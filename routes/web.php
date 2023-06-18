<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SendEmailController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PaymentCallbackController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\CheckOngkirController;
use App\Http\Controllers\VehicleController;
use App\Http\Controllers\VisitorController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\PermissionController;

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

Route::get('/', [VisitorController::class,'index']);


Auth::routes();

// Users
Route::group(['middleware' => ['auth']], function() {
    Route::resource('permissions', PermissionController::class);
    Route::resource('roles', RoleController::class);
});  

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('payments', PaymentController::class);
// Search All
Route::get('/vehicles-search-car', [VisitorController::class, 'search_car'])->name('search.car');
Route::get('/search-all', [VisitorController::class, 'search_all'])->name('search.all');

// Vehicles
Route::resource('/vehicles', VehicleController::class);
// Route::get('/vehicles', [VehicleController::class, 'index'])->name('vehicles.index');
// Route::get('/vehicles/create', [VehicleController::class, 'create'])->name('vehicles.create');
// Route::post('/vehicles', [VehicleController::class, 'store'])->name('vehicles.store');
// Route::get('/vehicles/{vehicle}', [VehicleController::class, 'show'])->name('vehicles.show');
// Route::get('/vehicles/{vehicle}/edit', [VehicleController::class, 'edit'])->name('vehicles.edit');
// Route::put('/vehicles/{vehicle}', [VehicleController::class, 'update'])->name('vehicles.update');
// Route::delete('/vehicles/{vehicle}', [VehicleController::class, 'destroy'])->name('vehicles.destroy');


// Send Email
Route::get('/send-email', [SendEmailController::class, 'index'])->name('kirim-email');
Route::post('/post-email', [SendEmailController::class, 'store'])->name('post-email');

Route::group(['middleware' => ['auth']], function() {
    // Route::resource('permissions', PermissionController::class);
    // Route::resource('roles', RoleController::class);

    Route::resource('users', UserController::class);
    // Route::get('user/update', [RegisterController::class, 'update'])->name('user-update');
    Route::get('user/export-excel', [UserController::class, 'export_excel'])->name('user.export-excel');
    Route::get('user/export-csv', [UserController::class, 'export_csv'])->name('user.export-csv');
    Route::get('user/export-pdf', [UserController::class, 'export_pdf'])->name('user.export-pdf');
    Route::get('user/is-online', [UserController::class, 'is_online'])->name('user.is-online');
    Route::get('user-search', [UserController::class, 'user_search'])->name('user.search');

});  

Route::get('/order',[OrderController::class, 'index']);
Route::post('/checkout',[OrderController::class, 'checkout']);
Route::get('/invoice/{id}',[OrderController::class, 'invoice']);


// ONGKIR
Route::get('/ongkir', [CheckOngkirController::class, 'index']);
Route::post('/ongkir',[CheckOngkirController::class, 'check_ongkir']);
Route::get('/cities/{province_id}', [CheckOngkirController::class, 'getCities']);
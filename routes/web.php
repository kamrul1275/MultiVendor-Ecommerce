<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Backend\VendorController;
use Illuminate\Support\Facades\Route;

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

require __DIR__.'/auth.php';




Route::middleware(['auth', 'role:vendor'])->group(function () {



// admin part..........
Route::get('/admin/login', [AdminController::class,'AdminLogin'])->name('admin.login');



Route::get('/admin/dashboard', [AdminController::class,'AdminDashboard'])->name('admin.dashboard');


Route::get('/admin/logout', [AdminController::class,'AdminLogout'])->name('admin.logout');


Route::get('/admin/profile', [AdminController::class,'AdminProfile'])->name('admin.profile');
Route::post('/admin/profile/store', [AdminController::class,'AdminProfilestore'])->name('admin.profile.store');


// Brand part......

Route::get('/create/brand', [BrandController::class,'CreateBrand'])->name('admin.create_brand');

Route::get('/all/brand', [BrandController::class,'AllBrand'])->name('admin.all_brand');








// vendor manage

Route::get('/admin/inactive', [AdminController::class,'AdminInactive'])->name('admin.inactive');

Route::get('/admin/active', [AdminController::class,'AdminActive'])->name('admin.active');




});






Route::get('/vendor/login', [VendorController::class,'VendorLogin'])->name('vendor.login');




Route::middleware(['auth', 'role:vendor'])->group(function () {



    Route::get('/vendor/dashboard', [VendorController::class,'VendorDashboard'])->name('vendor.dashboard');


    Route::get('/vendor/logout', [VendorController::class,'VendorLogout'])->name('vendor.logout');


    Route::get('/vendor/profile', [VendorController::class,'VendorProfile'])->name('vendor.profile');





});





// Vendor Part




<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\CouponController;
use App\Http\Controllers\Backend\SubCategoryController;
use App\Http\Controllers\Backend\VendorController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\UserController; 
use App\Http\Controllers\Frontend\NewProductController; 
use App\Http\Controllers\Frontend\WishlistController;
use Illuminate\Support\Facades\Route;




// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })

//->middleware(['auth', 'verified'])->name('dashboard');

// frontend part start.....


Route::get('/',[UserController::class,'Index'])->name('frontend.index');


//Route::get('login',[UserController::class,'UserLogin'])->name('frontend.login');



Route::middleware('auth','verified')->group(function(){


    Route::get('/dashboard',[UserController::class,'UserDashboard'])->name('frontend.dashboard');
    Route::get('/user/logout',[UserController::class,'UserDestroy'])->name('user.logout');

    Route::get('/user/profile',[UserController::class,'UserProfile'])->name('user.profile');

    Route::post('/user/profile/store',[UserController::class,'UserProfileStore'])->name('user.profile.store');


});





Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';




Route::get('/admin/login', [AdminController::class,'AdminLoginForm'])->name('admin.loginForm');


Route::middleware(['auth', 'role:admin'])->group(function () {



// admin part..........



Route::get('/admin/dashboard', [AdminController::class,'AdminDashboard'])->name('admin.dashboard');


Route::get('/admin/logout', [AdminController::class,'AdminLogout'])->name('admin.logout');


Route::get('/admin/profile', [AdminController::class,'AdminProfile'])->name('admin.profile');
Route::post('/admin/profile/store', [AdminController::class,'AdminProfilestore'])->name('admin.profile.store');












// Brand part......

Route::get('/create/brand', [BrandController::class,'CreateBrand'])->name('admin.create_brand');

Route::get('/all/brand', [BrandController::class,'AllBrand'])->name('admin.all_brand');

Route::post('/store/brand', [BrandController::class,'StoreBrand'])->name('brand.store');

Route::get('/edit/brand/{id}', [BrandController::class,'EditBrand'])->name('brand.edit');

Route::post('/update/brand/{id}', [BrandController::class,'UpdateBrand'])->name('brand.update');

Route::get('/delete/brand/{id}', [BrandController::class,'DeleteBrand'])->name('brand.delete');












// Category part......

Route::get('/create/category', [CategoryController::class,'CreateCategory'])->name('Category.create_category');

Route::get('/all/category', [CategoryController::class,'AllCategory'])->name('Category.all_category');

Route::post('/store/category', [CategoryController::class,'StoreCategory'])->name('category.store');

Route::get('/edit/category/{id}', [CategoryController::class,'EditCategory'])->name('category.edit');

Route::post('/update/category/{id}', [CategoryController::class,'UpdateCategory'])->name('category.update');

Route::get('/delete/category/{id}', [CategoryController::class,'DeleteCategory'])->name('category.delete');





// Category part......

Route::get('/create/subcategory', [SubCategoryController::class,'CreateSubCategory'])->name('SubCategory.create_subcategory');

Route::get('/all/subcategory', [SubCategoryController::class,'AllSubCategory'])->name('SubCategory.all_subcategory');

Route::post('/store/subcategory', [SubCategoryController::class,'StoreSubCategory'])->name('SubCategory.store');

Route::get('/edit/subcategory/{id}', [SubCategoryController::class,'EditSubCategory'])->name('SubCategory.edit');

Route::post('/update/subcategory/{id}', [SubCategoryController::class,'UpdateSubCategory'])->name('SubCategory.update');

Route::get('/delete/subcategory/{id}', [SubCategoryController::class,'DeleteSubCategory'])->name('SubCategory.delete');


Route::get('/subcategory/ajax/{category_id}', [SubCategoryController::class,'GetSubCategory']);







// vendor manage

Route::get('/inactive/vendor', [AdminController::class,'InactiveVendor'])->name('vendor.inactive');

Route::get('/inactive/vendor/details/{id}', [AdminController::class,'InactiveVendorDetails'])->name('vendor.inactive.details');

Route::post('/inactive/vendor/approve', [AdminController::class,'InactiveVendorApprove'])->name('inactive.vendor.approve');


Route::get('/active/vendor', [AdminController::class,'ActiveVendor'])->name('vendor.active');

Route::get('/active/vendor/details/{id}', [AdminController::class,'ActiveVendorDetails'])->name('vendor.active.details');

Route::post('/active/vendor/approve', [AdminController::class,'ActiveVendorApprove'])->name('vendor.active.approve');


// Product part


Route::get('/create/product', [ProductController::class,'CreateProduct'])->name('create.product');


Route::get('/all/product', [ProductController::class,'AllProduct'])->name('all.product');

Route::post('/store/product', [ProductController::class,'StoreProduct'])->name('store.product');


});






Route::get('/vendor/login', [VendorController::class,'VendorLogin'])->name('vendor.login');

Route::get('/vendor/register', [VendorController::class,'VendorRegister'])->name('vendor.register');

Route::post('/vendor/register', [VendorController::class,'Vendorstore'])->name('vendor.register.store');



    Route::middleware('auth','role:vendor')->group(function(){


    Route::get('/vendor/dashboard', [VendorController::class,'VendorDashboard'])->name('vendor.dashboard');


    Route::get('/vendor/logout', [VendorController::class,'VendorLogout'])->name('vendor.logout');


    Route::get('/vendor/profile', [VendorController::class,'VendorProfile'])->name('vendor.profile');

    Route::post('/vendor/profile/store', [VendorController::class,'VendorProfileStore'])->name('vendor.profile.store');

















});



// product modal ajax part



Route::get('/product/view/{id}',[NewProductController::class,'ProductModalVew']);



Route::post(' Cart/Data/Store/{id}',[CartController::class,'addToCartSore']);

Route::get(' /product/minit/cart/',[CartController::class,'miniCartGet']);


Route::get('/remove/minit/cart/{rowId}',[CartController::class,'removeminiCart']);



// wishlist Part 



Route::middleware(['auth','role:user'])->group(function () {


    Route::get('/wishlist',[WishlistController::class,'WshlistProduct'])->name('wishlist');

    Route::post('/add-to/wishlist/{product_id}',[WishlistController::class,'addToWshlist']);

    Route::get('/get/wishlist/product',[WishlistController::class,'GetWshlistProduct']);




    Route::get('/get/wishlist/remove/{id}',[WishlistController::class,'WishlistRemove']);

    // Route::get('/wishlist-remove/{id}' , 'WishlistRemove');


    // MyCart
    Route::get('/mycart',[CartController::class,'myCart'])->name('mycart'); 
    Route::get('/get/my/cart',[CartController::class,'getMyCart'])->name('get.My.Cart');
    //Route::get('/remove/mycart/{rowId}',[CartController::class,'removeMyCart'])->name('remove.MyCart');
    Route::get('/cart-remove/{rowId}' , [CartController::class,'CartRemove']);
    Route::get('/cart/decrement/{rowId}' , [CartController::class,'CartQntyDecrement']);
    Route::get('/cart/increment/{rowId}' , [CartController::class,'CartQntyIncrement']);
   
});





//Route::get('/all/coupon',[CouponController::class,'AllCoupon']);
Route::get('/create/coupon',[CouponController::class,'CreateCoupon'])->name('create.coupon');
Route::post('/store/coupon',[CouponController::class,'StoreCoupon'])->name('store.coupon');
Route::get('/coupon',[CouponController::class,'AllCoupon'])->name('all.coupon');


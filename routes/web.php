<?php

use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\FrontendController as AdminFrontendController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SubCategoryController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\CheckoutController;
use App\Http\Controllers\Frontend\UserController;
use App\Http\Controllers\Frontend\WishlistController;
use App\Http\Controllers\Frontend\RatingController;
use App\Http\Controllers\Frontend\ReviewController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use App\Mail\InvoiceMail;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [FrontendController::class, 'index']);
Route::get('collection', [FrontendController::class, 'category']);
Route::get('collection/{cat_slug}', [FrontendController::class, 'viewcategory']);
Route::get('collection/{cat_slug}/{subcat_slug}', [FrontendController::class, 'subcatview']);
Route::get('collection/{cat_slug}/{subcat_slug}/{prod_slug}', [FrontendController::class, 'productview']);

Auth::routes(['verify' => true]);

Route::get('/searchajax', 'Frontend\UserController@SearchautoComplete')->name('searchproductajax');
Route::post('/searching', 'Frontend\UserController@result');

Route::get('slider', 'Admin\FrontendController@slider');
Route::get('add-slider', 'Admin\FrontendController@add');
Route::post('insert-slider', 'Admin\FrontendController@insert');
Route::get('edit-slider/{id}', 'Admin\FrontendController@edit');
Route::put('update-slider/{id}', 'Admin\FrontendController@update');
Route::get('delete-slider/{id}', 'Admin\FrontendController@destroy');

Route::get('load-cart-data', [CartController::class, 'cartcount']);
Route::get('load-wishlist-data', [WishlistController::class, 'wishlistcount']);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// mail
Route::get('/email', [InvoiceMail::class, 'invoice']);

//email verification
Route::get('/email/verify', function () {
    return view('auth.verify');
})->middleware('auth')->name('verification.notice');
Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    return redirect('/home')->with('status', 'verification success.!');
})->middleware(['auth', 'signed'])->name('verification.verify');
Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();

    return back()->with('status', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');
Route::get('email/resend', 'Auth\VerificationController@resend')->name('verification.resend');

Route::post('add-to-cart', [CartController::class, 'addToCart']);
Route::post('delete-cart-item', [CartController::class, 'deleteCartItem']);
Route::post('update-cart', [CartController::class, 'updateCart']);

Route::post('add-to-wishlist', [WishlistController::class, 'add']);
Route::post('delete-wishlist-item', [WishlistController::class, 'deleteitem']);

Route::middleware(['auth'])->group(function () {
    Route::get('cart', [CartController::class, 'viewcart']);
    Route::get('checkout', [CheckoutController::class, 'index']);
    Route::post('place-order', [CheckoutController::class, 'placeorder']);

    Route::get('my-orders', [UserController::class, 'index']);
    Route::get('view-order/{id}', [UserController::class, 'vieworder']);
    Route::put('cancel-order/{id}', [UserController::class, 'cancelorder']);
    Route::get('generate-invoice/{order_id}', [UserController::class, 'invoice']);

    Route::post('add-rating', [RatingController::class, 'add']);

    Route::get('add-review/{product_slug}/userreview', [ReviewController::class, 'add']);
    Route::post('add-review', [ReviewController::class, 'create']);
    Route::get('edit-review/{product_slug}/userreview', [ReviewController::class, 'edit']);
    Route::put('update-review', [ReviewController::class, 'update']);

    Route::get('wishlist', [WishlistController::class, 'index']);

    Route::get('my-profile', [UserController::class, 'myprofile']);
    Route::get('my-profile/edit', [UserController::class, 'editprofile']);
    Route::put('update-profile', [UserController::class, 'updateprofile']);
    Route::post('my-profile/delete/{id}', [UserController::class, 'deleteacc']);
});

Route::middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('/dashboard', 'Admin\FrontendController@index');

    Route::get('categories', 'Admin\CategoryController@index')->name('categories');
    Route::get('add-category', 'Admin\CategoryController@add')->name('add-category');
    Route::post('insert-category', 'Admin\CategoryController@insert');
    Route::get('edit-category/{id}', [CategoryController::class, 'edit'])->name('edit-category');
    Route::put('update-category/{id}', [CategoryController::class, 'update']);
    Route::get('delete-category/{id}', [CategoryController::class, 'destroy']);

    Route::get('sub-category', [SubCategoryController::class, 'index'])->name('subcategory');
    Route::get('add-sub-category', [SubCategoryController::class, 'add'])->name('addsubcategory');
    Route::post('insert-sub-category', [SubCategoryController::class, 'insert']);
    Route::get('edit-sub-category/{id}', [SubCategoryController::class, 'edit'])->name('editsubcategory');
    Route::put('update-sub-category/{id}', [SubCategoryController::class, 'update']);
    Route::get('delete-sub-category/{id}', [SubCategoryController::class, 'destroy']);

    Route::get('products', [ProductController::class, 'index'])->name('products');
    Route::get('add-product', [ProductController::class, 'add'])->name('add-product');
    Route::post('insert-product', [ProductController::class, 'insert']);

    Route::get('edit-product/{id}', [ProductController::class, 'edit'])->name('edit-product');
    Route::put('update-product/{id}', [ProductController::class, 'update']);
    Route::get('delete-product/{id}', [ProductController::class, 'destroy']);

    Route::get('orders', [OrderController::class, 'index'])->name('orders');
    Route::get('admin/view-order/{id}', [OrderController::class, 'view'])->name('view-order');
    Route::put('update-order/{id}', [OrderController::class, 'updateorder']);
    Route::get('order-history', [OrderController::class, 'orderhistory'])->name('order-history');

    Route::get('users', [DashboardController::class, 'users'])->name('users');
    Route::get('view-user/{id}', [DashboardController::class, 'viewuser'])->name('viewuser');
    Route::get('edit-user/{id}', [DashboardController::class, 'edituser'])->name('edituser');
    Route::put('update-users/{id}', [DashboardController::class, 'updateuser'])->name('updateuser');

    Route::get('admin-profile', [UserController::class, 'adminprofile']);
    Route::get('admin-profile/edit', [UserController::class, 'editadminprofile']);
    Route::put('update-admin-profile', [UserController::class, 'updateadminprofile']);
});

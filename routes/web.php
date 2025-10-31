<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DetailsController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InfoController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// Public routes
Route::get('/', [HomeController::class, 'index']);
Route::get('/home', [HomeController::class, 'index']);
Route::post('/search', [SearchController::class, 'search']);
Route::get('/search', [SearchController::class, 'search']);
Route::get('/shop', [ShopController::class, 'index']);
Route::get('/contact', [ContactController::class, 'index']);
Route::get('/about-us', [AboutController::class, 'index']);

Route::post('/submit-contact-post', [ContactController::class, 'submitContactPost']);
Route::get('/all-contact', [ContactController::class, 'listContact']);

// Admin routes
Route::get('/admin', [AdminController::class, 'index']);
Route::get('/dashboard', [AdminController::class, 'show_dashboard']);
Route::post('/admin-dashboard', [AdminController::class, 'dashboard']);
Route::get('/logout-admin', [AdminController::class, 'logout_admin']);

//Category routes
Route::get('/add-category', [CategoryController::class, 'addCategory']);
Route::get('/all-category', [CategoryController::class, 'listCategory']);
Route::get('/update-category/{category_id}', [CategoryController::class, 'updateCategory']);
Route::get('/delete-category/{category_id}', [CategoryController::class, 'deleteCategory']);

Route::post('/add-category-post', [CategoryController::class, 'addCategoryPost']);
Route::post('/update-category-post/{category_id}', [CategoryController::class, 'updateCategoryPost']);

//Banner routes
Route::get('/all-banner', [BannerController::class, 'listBanners']);
Route::get('/update-banner/{id}', [BannerController::class, 'updateBanner']);

Route::post('/update-banner-post/{id}', [BannerController::class, 'updateBannerPost']);

//Info routes
Route::get('/all-info', [InfoController::class, 'listInfo']);
Route::post('/update-info-post/{id}', [InfoController::class, 'updateInfoPost']);

//Type routes
Route::get('/add-type', [TypeController::class, 'addType']);
Route::get('/all-type', [TypeController::class, 'listType']);
Route::get('/update-type/{type_id}', [TypeController::class, 'updateType']);
Route::get('/delete-type/{type_id}', [TypeController::class, 'deleteType']);
Route::get('/category_type/{id}', [TypeController::class, 'showCategoryType']);

Route::post('/add-type-post', [TypeController::class, 'addTypePost']);
Route::post('/update-type-post/{type_id}', [TypeController::class, 'updateTypePost']);

//Details routes
Route::get('/product/{id}', [DetailsController::class, 'listDetails']);

//Cart routes
Route::get('/cart', [CartController::class, 'listCart']);
Route::get('/delete-from-cart/{rowId}', [CartController::class, 'deleteFromCart']);

Route::post('/add-to-cart/{productId}', [CartController::class, 'addToCart']);
Route::post('/update-cart', [CartController::class, 'updateCart']);

//Checkout routes
Route::get('/login-checkout', [CheckoutController::class, 'loginCheckout']);
Route::post('/login-co', [CheckoutController::class, 'login']);
Route::post('/sign-up-co', [CheckoutController::class, 'signUp']);
Route::get('/checkout', [CheckoutController::class, 'checkout']);

//Order routes
Route::post('/order-confirm', [OrderController::class, 'orderConfirm']);
Route::get('/order', [OrderController::class, 'order']);

Route::get('order-details/{id}', [OrderController::class, 'orderDetails']);
Route::get('/all-order', [OrderController::class, 'listOrder']);
Route::get('/update-order/{id}', [OrderController::class, 'updateOrder']);

//User routes
Route::get('/login-form', [UserController::class, 'loginForm']);
Route::post('/login', [UserController::class, 'login']);
Route::post('/sign-up', [UserController::class, 'signUp']);
Route::get('/logout', [UserController::class, 'logout']);
Route::get('/profile', [UserController::class, 'profile']);
Route::get('/update-profile', [UserController::class, 'updateProfile']);
Route::post('/update-profile-post', [UserController::class, 'updateProfilePost']);

//Favorite routes
Route::post('/add-to-favorite/{productId}', [FavoriteController::class, 'addToFavorite']);
Route::get('/remove-from-favorite/{productId}', [FavoriteController::class, 'removeFromFavorite']);
Route::get('/favorite', [FavoriteController::class, 'myFavorites']);

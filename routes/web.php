<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CatalogueController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DetailController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TransactionController;
use App\Models\Cart;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Auth;
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

//user 
// home page
Route::get('/', [HomeController::class, 'index'])
    ->name('home');

// catalogue page
Route::get('/catalogue/{id}', [CatalogueController::class, 'index'])
    ->name('catalogue');

//detail catalogue page
Route::get('/detail/{slug}', [DetailController::class, 'index'])
    ->name('detail');

//cart page
Route::get('/cart', [CartController::class, 'index'])
    ->name('cart')
    ->Middleware('auth');

//add to cart
Route::post('/cart', [CartController::class, 'store'])
    ->name('cart.store')
    ->Middleware('auth');

//update cart
Route::post('/cart/{id}', [CartController::class, 'update'])
    ->name('cart.update')
    ->Middleware('auth');

//cart delete
Route::get('/cart/{id}', [CartController::class, 'destroy'])
    ->name('cart.destroy')
    ->Middleware('auth');

//checkout page
Route::get('/checkout', [CheckoutController::class, 'index'])
    ->name('checkout')
    ->Middleware('auth');

//checkout store
Route::post('/checkout', [CheckoutController::class, 'store'])
    ->name('checkout.store')
    ->Middleware('auth');

//transaction page
Route::get('/transaction', [TransactionController::class, 'index'])
    ->name('transaction')
    ->Middleware('auth');

//transaction store
Route::post('/transaction', [TransactionController::class, 'store'])
    ->name('transaction.store')
    ->Middleware('auth');

//transaction detail
Route::get('/transaction/{id}', [TransactionController::class, 'show'])
    ->name('transaction.show')
    ->Middleware('auth');

//admin 
//Dashboard Page
Route::get('/dashboard', [DashboardController::class, 'index'])
    ->name('dashboard')
    ->Middleware('auth');

//Dashboard Category
Route::get('/dashboard/category', [DashboardController::class, 'indexCategory'])
    ->name('dashboard.category')
    ->Middleware('auth');

//Create category
Route::get('/dashboard/category/create', [DashboardController::class, 'createCategory'])
    ->name('dashboard.category.create')
    ->Middleware('auth');

//add category
Route::post('/dashboard/category/store', [DashboardController::class, 'storeCategory'])
    ->name('dashboard.category.store')
    ->Middleware('auth');

//edit category
Route::get('/dashboard/category/edit/{id}', [DashboardController::class, 'editCategory'])
    ->name('dashboard.category.edit')
    ->Middleware('auth');

//update category
Route::post('/dashboard/category/update/{id}', [DashboardController::class, 'updateCategory'])
    ->name('dashboard.category.update')
    ->Middleware('auth');

//detele category
Route::get('/dashboard/category/delete/{id}', [DashboardController::class, 'deleteCategory'])
    ->name('dashboard.category.delete')
    ->Middleware('auth');

//Dachboard Cloth
Route::get('/dashboard/catalogue', [DashboardController::class, 'indexCatalogue'])
    ->name('dashboard.catalogue')
    ->Middleware('auth');

//create Catalogue
Route::get('/dashboard/catalogue/create', [DashboardController::class, 'createCatalogue'])
    ->name('dashboard.catalogue.create')
    ->Middleware('auth');

//add Catalogue
Route::post('/dashboard/catalogue/store', [DashboardController::class, 'storeCatalogue'])
    ->name('dashboard.catalogue.store')
    ->Middleware('auth');

//view edit catalogue
Route::get('/dashboard/catalogue/edit/{id}', [DashboardController::class, 'editCatalogue'])
    ->name('dashboard.catalogue.edit')
    ->Middleware('auth');

//update catalogue
Route::post('/dashboard/catalogue/update/{id}', [DashboardController::class, 'updateCatalogue'])
    ->name('dashboard.catalogue.update')
    ->Middleware('auth');

//delete catalogue
Route::get('/dashboard/catalogue/delete/{id}', [DashboardController::class, 'deleteCatalogue'])
    ->name('dashboard.catalogue.delete')
    ->Middleware('auth');

//detail catalogue
Route::get('/dashboard/catalogue/detail/{id}', [DashboardController::class, 'detailCatalogue'])
    ->name('dashboard.catalogue.detail')
    ->Middleware('auth');

//Dashboard Transaction
Route::get('/dashboard/transaction', [DashboardController::class, 'indexTransaction'])
    ->name('dashboard.transaction')
    ->Middleware('auth');

//view profile
Route::get('/profile', [ProfileController::class, 'index'])
    ->name('profile')
    ->Middleware('auth');

Auth::routes();

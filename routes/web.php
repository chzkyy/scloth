<?php

use App\Http\Controllers\CatalogueController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DetailController;
use App\Http\Controllers\HomeController;
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

// home page
Route::get('/', [HomeController::class, 'index'])
    ->name('home');

Route::get('/detail/{slug}', [DetailController::class, 'index'])
    ->name('detail');

Route::get('/catalogue/{id}', [CatalogueController::class, 'index'])
    ->name('catalogue');

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

Auth::routes();

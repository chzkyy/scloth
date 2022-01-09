<?php

use App\Http\Controllers\CatalogueController;
<<<<<<< HEAD
use App\Http\Controllers\DashboardController;
=======
>>>>>>> 9dea6018ea1879c9cb23a6bfc56b900819cff2c0
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
<<<<<<< HEAD

//Dashboard Page
Route::get('/dashboard', [DashboardController::class, 'index'])
    ->name('dashboard')
    ->Middleware('auth');

Route::get('/dashboard/category', [DashboardController::class, 'indexCategory'])
    ->name('dashboard.category')
    ->Middleware('auth');

Route::get('/dashboard/catalogue', [DashboardController::class, 'indexCatalogue'])
    ->name('dashboard.catalogue')
    ->Middleware('auth');

Auth::routes();
=======
>>>>>>> 9dea6018ea1879c9cb23a6bfc56b900819cff2c0

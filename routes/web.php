<?php

use App\Http\Controllers\Admin\CollectionTypeController;
use App\Http\Controllers\Admin\LoanController;
use App\Http\Controllers\Admin\SubjectController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\CollectionController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserLoanController;
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
    return view('home');
});

Route::resource('home', HomeController::class);

Route::resource('collection', CollectionController::class);

Route::resource('author', AuthorController::class);

Route::resource('dashboard', DashboardController::class)->middleware('auth');

Route::resource('my-loan', UserLoanController::class)->middleware('member');

Route::resource('subjects', SubjectController::class)->middleware('admin');

Route::resource('collection-type', CollectionTypeController::class)->middleware('admin');

Route::resource('loans', LoanController::class)->middleware('admin');

Auth::routes();

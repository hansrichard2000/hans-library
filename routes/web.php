<?php

use App\Http\Controllers\Admin\AdminCollectionController;
use App\Http\Controllers\Admin\CollectionTypeController;
use App\Http\Controllers\Admin\LoanController;
use App\Http\Controllers\Admin\SubjectController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\CollectionController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MemberLoanController;
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

Route::resource('my-loan', MemberLoanController::class)->middleware('member');

Route::resource('collections', AdminCollectionController::class)->middleware('admin');

Route::resource('collection-type', CollectionTypeController::class)->middleware('admin');

Route::resource('loans', LoanController::class)->middleware('admin');
Route::post('loans/reject', [LoanController::class, 'reject'])->name('loans.reject');
Route::post('loans/approve', [LoanController::class, 'approve'])->name('loans.approve');
Route::post('loans/expire', [LoanController::class, 'expire'])->name('loans.expire');

Route::resource('users', UserController::class)->middleware('admin');

//Route::post('users/suspend', [UserController::class, 'suspend'])->name('users.suspend');
//Route::post('users/active', [UserController::class, 'active'])->name('users.active');

Auth::routes();

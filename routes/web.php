<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PrintController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\RakController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\ReportController;
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

//Default Landing
Route::get('/', [LandingController::class, 'index']);
Route::get('/opac', [LandingController::class, 'opac']);
Route::get('/about', [LandingController::class, 'about']);
Route::get('/helper', [LandingController::class, 'helper']);
Route::get('/login', [LandingController::class, 'login']);
Route::post('/opac/paket', [LandingController::class, 'paket']);
Route::get('/opac/barcode', [LandingController::class, 'barcode']);

//Auth
Route::post('/login', [LandingController::class, 'authenticate'])->name('login');
Route::post('/logout', [DashboardController::class, 'logout'])->middleware('auth');

//Dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');
Route::resource('/dashboard/profiles', ProfileController::class)->middleware('auth');
Route::resource('/dashboard/users', UserController::class)->middleware('auth');
Route::resource('/dashboard/members', MemberController::class)->middleware('auth');
Route::resource('/dashboard/books', BookController::class)->middleware('auth');
Route::resource('/dashboard/raks', RakController::class)->middleware('auth');
Route::resource('/dashboard/transactions', TransactionController::class)->middleware('auth');

Route::get('/dashboard/reports', [ReportController::class, 'index'])->middleware('auth');
Route::get('/dashboard/reports/books', [ReportController::class, 'books'])->middleware('auth');
Route::get('/dashboard/reports/users', [ReportController::class, 'users'])->middleware('auth');
Route::get('/dashboard/reports/members', [ReportController::class, 'members'])->middleware('auth');

Route::get('/dashboard/reports/confirm/transactions', [ReportController::class, 'confirm'])->middleware('auth');
Route::post('/dashboard/reports/confirm/transactions', [ReportController::class, 'transactions'])->middleware('auth');

Route::post('/dashboard/transactions/createpengembalian', [TransactionController::class, 'pengembalian'])->middleware('auth');
Route::post('/dashboard/transactions/prosespengembalian', [TransactionController::class, 'prosespengembalian'])->middleware('auth');

//Print
Route::post('/dashboard/users/print', [PrintController::class, 'print_user']);
Route::post('/dashboard/members/print', [PrintController::class, 'print_member']);
Route::post('/dashboard/books/print', [PrintController::class, 'print_book']);

//Import Excel Books
Route::post('/dashboard/books/import', [BookController::class, 'import'])->middleware('auth');

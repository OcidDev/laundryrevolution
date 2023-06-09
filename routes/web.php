<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\MentorController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\BusinessController;
use App\Http\Controllers\BusinessUserController;

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

Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::resource('/member', MemberController::class);
// Route::resource('/business', BusinessController::class);
// Route::resource('/business_user', BusinessUserController::class);
// Route::get('/business/report/{$id}', [BusinessController::class, 'report'])->name('bsuiness.report');
Route::resource('/mentoring', MentorController::class);
// Route::resource('/report', ReportController::class);



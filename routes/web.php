<?php

use App\Http\Controllers\Admin\MainController as AdminController;
use App\Http\Controllers\Agency\MainController as AgencyController;
use App\Http\Controllers\Agent\MainController as AgentController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\User\MainController as DashboardController;
use App\Http\Controllers\UserController;
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

Auth::routes();

Route::get('/', [MainController::class, 'index'])->name('index');
Route::get('/search', [MainController::class, 'search'])->name('search');
Route::get('/agency/details/{id}', [MainController::class, 'agencydetails'])->name('agencydetails');
Route::get('/agent/details/{id}', [MainController::class, 'agentdetails'])->name('agentdetails');

Route::get('lang/{locale}', [MainController::class, 'lang']);

Route::middleware('auth')->group(function () {

    Route::get('/chat', [ChatController::class, 'index']);
    Route::get('/profile/{id}', [UserController::class, 'show'])->name('profile.show');
    Route::put('/profile/{id}', [UserController::class, 'update'])->name('profile.update');

    Route::prefix('admin')->middleware('role:admin')->group(function () {
        Route::get('/', [AdminController::class, 'index'])->name('index');
    });
    Route::prefix('agency')->middleware('role:agency|admin')->group(function () {
        Route::get('/', [AgencyController::class, 'index'])->name('agency.index');
        Route::get('/agents', [AgencyController::class, 'agents'])->name('agency.agents');
    });
    Route::prefix('agent')->middleware('role:agent|admin')->group(function () {
        Route::get('/', [AgentController::class, 'index'])->name('index');
    });
    Route::prefix('user')->middleware('role:user|admin')->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('index');
    });
});

//Update User Details
// Route::post('/update-profile/{id}', [HomeController::class, 'updateProfile'])->name('updateProfile');
// Route::post('/update-password/{id}', [HomeController::class, 'updatePassword'])->name('updatePassword');

// Route::get('{any}', [HomeController::class, 'index'])->name('index');

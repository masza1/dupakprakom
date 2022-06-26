<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PositionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SubUnsurController;
use App\Http\Controllers\UnsurController;
use App\Http\Controllers\UserController;
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
    return 'Welcome';
})->middleware('auth');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';


// prakom
Route::prefix('prakom')->name('prakom.')->middleware('auth')->group(function () {
    Route::get('dashboard', [DashboardController::class, 'prakom'])->name('dashboard');
});

// penilai
Route::prefix('penilai')->name('penilai.')->middleware('auth')->group(function () {
    Route::get('dashboard', [DashboardController::class, 'penilai'])->name('dashboard');
});

// sekretariat
Route::prefix('sekretariat')->name('sekretariat.')->middleware('auth')->group(function () {
    Route::get('dashboard', [DashboardController::class, 'sekretariat'])->name('dashboard');
    Route::resource('position', PositionController::class)->parameters(['position' => 'id'])->names('position');
    Route::resource('sub-unsur', SubUnsurController::class)->parameters(['sub-unsur' => 'id'])->names('sub-unsur');
    Route::resource('unsur', UnsurController::class)->parameters(['unsur' => 'id'])->names('unsur');
    Route::resource('users', UserController::class)->parameters(['users' => 'id'])->names('users');
    
    Route::get('users', [UserController::class, 'index'])->name('users.index');

    Route::get('profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::put('profile', [ProfileController::class, 'update'])->name('profile.update');
});
<?php

use App\Http\Controllers\ActivityController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DetailActivityController;
use App\Http\Controllers\DetailActivityPenController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\PenActivityController;
use App\Http\Controllers\PenilaianController;
use App\Http\Controllers\PositionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SubmissionController;
use App\Http\Controllers\SubUnsurController;
use App\Http\Controllers\UnsurController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\DB;
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
Route::get('test-db', function(){
    return DB::table('DBKOTA')->get();
});

Route::get('/', function () {
    return 'Welcome';
})->middleware('auth');

Route::get('test-ui', function(){
    return view('test-ui');
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::get('get-sub-element', [SubUnsurController::class, 'getSubUnsur'])->name('get-sub-element');
Route::get('get-activity-by-element-and-sub', [ActivityController::class, 'getActivity'])->name('get-activity');
Route::get('get-activity-pen-by-element-and-sub', [PenActivityController::class, 'getActivityPen'])->name('get-activity-pen');
Route::get('profile', [ProfileController::class, 'show'])->name('profile.show')->middleware('auth');
Route::put('profile', [ProfileController::class, 'update'])->name('profile.update')->middleware('auth');

// prakom

Route::prefix('prakom')->name('prakom.')->middleware('auth')->group(function () {
    Route::get('dashboard', [DashboardController::class, 'prakom'])->name('dashboard');

    Route::resource('pengajuan', SubmissionController::class)->parameters(['pengajuan' => 'id'])->names('pengajuan');
    Route::prefix('{submission}')->group(function(){
        Route::resource('detail-kegiatan', DetailActivityController::class)->parameters(['detail-kegiatan' => 'id'])->names('detail-kegitan');
        Route::resource('detail-kegiatan-pen', DetailActivityPenController::class)->parameters(['detail-kegiatan-pen' => 'id'])->names('detail-kegitan-pen');
    });
});

// penilai
Route::prefix('penilai')->name('penilai.')->middleware('auth')->group(function () {
    Route::get('dashboard', [DashboardController::class, 'penilai'])->name('dashboard');
    Route::get('pengajuan', [PenilaianController::class, 'index'])->name('index');
    Route::put('pengajuan/{id}', [PenilaianController::class, 'nilaiPengajuan'])->name('nilai-pengajuan');
    Route::put('pengajuan/{submission_id}/detail/{id}', [PenilaianController::class, 'nilaiDetail'])->name('nilai-detail');
    
});

// sekretariat
Route::prefix('sekretariat')->name('sekretariat.')->middleware('auth')->group(function () {
    Route::get('dashboard', [DashboardController::class, 'sekretariat'])->name('dashboard');
    Route::get('periode', [DashboardController::class, 'getPeriode'])->name('periode.index');
    Route::post('periode', [DashboardController::class, 'storePeriode']);
    Route::get('tanda-tangan', [DashboardController::class, 'getTTD'])->name('tanda-tangan');
    Route::post('tanda-tangan', [DashboardController::class, 'storeTTD']);
    
    Route::get('riwayat-pengajuan', [PenilaianController::class, 'indexRiwayat'])->name('index-riwayat');
    Route::get('riwayat-pengajuan-download', [PenilaianController::class, 'downloadRiwayat'])->name('download-riwayat');
    Route::get('pengajuan/{submission_id}/{employee_id}/cetak', [PenilaianController::class, 'cetak'])->name('cetak-pengajuan');

    Route::resource('activities', ActivityController::class)->parameters(['activities' => 'id'])->names('activities');
    Route::resource('pen-activities', PenActivityController::class)->parameters(['pen-activities' => 'id'])->names('pen-activities');
    Route::resource('news', NewsController::class)->parameters(['news' => 'id'])->names('news');
    Route::resource('position', PositionController::class)->parameters(['position' => 'id'])->names('position');
    Route::resource('sub-unsur', SubUnsurController::class)->parameters(['sub-unsur' => 'id'])->names('sub-unsur');
    Route::resource('unsur', UnsurController::class)->parameters(['unsur' => 'id'])->names('unsur');
    Route::resource('users', UserController::class)->parameters(['users' => 'id'])->names('users');
    
    // Route::get('users', [UserController::class, 'index'])->name('users.index');

});
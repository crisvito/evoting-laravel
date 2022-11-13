<?php

use App\Http\Controllers\admin\dashboard\AdminDashboardController;
use App\Http\Controllers\admin\voters\AdminVotersController;
use App\Http\Controllers\warga\dashboard\WargaDashboardController;
use App\Http\Controllers\public\PublicController;
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




Route::get('/', [PublicController::class, 'welcome'])->name('welcome');


Route::group(['middleware' => 'auth', 'middleware' => 'can:isAdmin'], function () {
    Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
        Route::get('dashboard', [AdminDashboardController::class, 'index'])->name('dashboard.index');

        Route::resource('dashboard/voters', AdminVotersController::class)->scoped([
            'voter' => 'username',
        ]);
    });
});

Route::group(['middleware' => 'auth', 'middleware' => 'can:isWarga'], function () {
    Route::group(['as' => 'warga.dashboard.'], function () {
        Route::get('dashboard', [WargaDashboardController::class, 'index'])->name('index');
    });
});

require __DIR__ . '/auth.php';

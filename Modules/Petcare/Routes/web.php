<?php

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

use Modules\Petcare\Http\Controllers\AppSettingController;
use Modules\Petcare\Http\Controllers\ServiceController;
use Modules\Petcare\Http\Controllers\SettingController;
use Modules\Petcare\Http\Controllers\StoreController;


Route::group(['middleware' => 'auth'], function () {

    Route::resource('services', ServiceController::class);

    // Route::get('general/settings', [SettingController::class, 'index']);
    Route::get('general/settings', [SettingController::class, 'edit'])->name('general_settings.edit');
    Route::put('general/settings/update', [SettingController::class, 'update'])->name('general_settings.update');

    // Operation Stores
    Route::get('store/index', [StoreController::class, 'index'])->name('store.index');
    Route::get('store/create', [StoreController::class, 'create'])->name('store.create');
    Route::post('store/store', [StoreController::class, 'store'])->name('store.store');
    Route::get('store/{id}/edit', [StoreController::class, 'edit'])->name('store.edit');
    Route::put('store/update/{id}', [StoreController::class, 'update'])->name('store.update');
    Route::delete('store/delete/{id}', [StoreController::class, 'destroy'])->name('store.destroy');

    // Operation Settings
    Route::get('setting/index', [AppSettingController::class, 'index'])->name('setting.index');
    Route::get('setting/create', [AppSettingController::class, 'create'])->name('setting.create');
    Route::post('setting/store', [AppSettingController::class, 'store'])->name('setting.store');
    Route::get('setting/{id}/edit', [AppSettingController::class, 'edit'])->name('setting.edit');
    Route::put('setting/update/{id}', [AppSettingController::class, 'update'])->name('setting.update');
    Route::delete('setting/delete/{id}', [AppSettingController::class, 'destroy'])->name('setting.destroy');
});

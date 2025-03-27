<?php

use App\Http\Controllers\Admin\Extensions\MaintenanceModeController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'admin', 'middleware' => ['verified', '2fa.verify', 'role:admin', 'PreventBackHistory']], function() {
    Route::controller(MaintenanceModeController::class)->group(function() {
        Route::get('/davinci/configs/maintenance', 'index')->name('admin.davinci.configs.maintenance');
        Route::post('/davinci/configs/maintenance', 'store')->name('admin.davinci.configs.maintenance.store');
    }); 
});

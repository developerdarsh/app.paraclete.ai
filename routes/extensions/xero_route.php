<?php

use App\Http\Controllers\Admin\Extensions\XeroSettingController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'admin', 'middleware' => ['verified', '2fa.verify', 'role:admin', 'PreventBackHistory']], function() {
    Route::controller(XeroSettingController::class)->group(function() {
        Route::get('/davinci/configs/xero', 'index')->name('admin.davinci.configs.xero');
        Route::post('/davinci/configs/xero', 'store')->name('admin.davinci.configs.xero.store');
    }); 
});

Route::controller(XeroSettingController::class)->group(function() {
    Route::get('/callback/xero', 'callback');
}); 

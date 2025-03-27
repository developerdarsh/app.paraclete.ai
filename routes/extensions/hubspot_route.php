<?php

use App\Http\Controllers\Admin\Extensions\HubspotController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'admin', 'middleware' => ['verified', '2fa.verify', 'role:admin', 'PreventBackHistory']], function() {
    Route::controller(HubspotController::class)->group(function() {
        Route::get('/davinci/configs/hubspot', 'index')->name('admin.davinci.configs.hubspot');
        Route::post('/davinci/configs/hubspot', 'store')->name('admin.davinci.configs.hubspot.store');
    }); 
});

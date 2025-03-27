<?php

use App\Http\Controllers\Admin\Extensions\WatsonController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'admin', 'middleware' => ['verified', '2fa.verify', 'role:admin', 'PreventBackHistory']], function() {
    Route::controller(WatsonController::class)->group(function() {
        Route::get('/davinci/configs/watson', 'index')->name('admin.davinci.configs.watson');
        Route::post('/davinci/configs/watson', 'store')->name('admin.davinci.configs.watson.store');
    }); 
});

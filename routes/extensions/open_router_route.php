<?php

use App\Http\Controllers\Admin\Extensions\OpenRouterController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'admin', 'middleware' => ['verified', '2fa.verify', 'role:admin', 'PreventBackHistory']], function() {
    Route::controller(OpenRouterController::class)->group(function() {
        Route::get('/davinci/configs/open-router', 'index')->name('admin.davinci.configs.openrouter');
        Route::post('/davinci/configs/open-router', 'store')->name('admin.davinci.configs.openrouter.store');
    }); 
});

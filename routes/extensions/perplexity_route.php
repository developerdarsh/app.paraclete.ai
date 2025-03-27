<?php

use App\Http\Controllers\Admin\Extensions\PerplexityController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'admin', 'middleware' => ['verified', '2fa.verify', 'role:admin', 'PreventBackHistory']], function() {
    Route::controller(PerplexityController::class)->group(function() {
        Route::get('/davinci/configs/perplexity', 'index')->name('admin.davinci.configs.perplexity');
        Route::post('/davinci/configs/perplexity', 'store')->name('admin.davinci.configs.perplexity.store');
    }); 
});

<?php

use App\Http\Controllers\Admin\Extensions\SpeechifyTextController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'admin', 'middleware' => ['verified', '2fa.verify', 'role:admin', 'PreventBackHistory']], function() {
    Route::controller(SpeechifyTextController::class)->group(function() {
        Route::get('/davinci/configs/speechify-text', 'index')->name('admin.davinci.configs.speechify.text');
        Route::post('/davinci/configs/speechify-text', 'store')->name('admin.davinci.configs.speechify.text.store');
    }); 
});

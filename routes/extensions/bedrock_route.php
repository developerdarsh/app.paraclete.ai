<?php

use App\Http\Controllers\Admin\Extensions\AmazonBedrockController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'admin', 'middleware' => ['verified', '2fa.verify', 'role:admin', 'PreventBackHistory']], function() {
    Route::controller(AmazonBedrockController::class)->group(function() {
        Route::get('/davinci/configs/bedrock', 'index')->name('admin.davinci.configs.bedrock');
        Route::post('/davinci/configs/bedrock', 'store')->name('admin.davinci.configs.bedrock.store');
    }); 
});

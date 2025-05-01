<?php

use App\Http\Controllers\Admin\Extensions\AzureOpenaiController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'admin', 'middleware' => ['verified', '2fa.verify', 'role:admin', 'PreventBackHistory']], function() {
    Route::controller(AzureOpenaiController::class)->group(function() {
        Route::get('/davinci/configs/azure-openai', 'index')->name('admin.davinci.configs.azure.openai');
        Route::post('/davinci/configs/azure-openai', 'store')->name('admin.davinci.configs.azure.openai.store');
    }); 
});

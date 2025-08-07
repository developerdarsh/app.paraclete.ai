<?php

use App\Http\Controllers\User\PlagiarismCheckerController;
use App\Http\Controllers\User\DetectorController;
use App\Http\Controllers\Admin\Extensions\PlagiarismController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'admin', 'middleware' => ['verified', '2fa.verify', 'role:admin', 'PreventBackHistory']], function() {
    Route::controller(PlagiarismController::class)->group(function() {
        Route::get('/davinci/configs/plagiarism', 'index')->name('admin.davinci.configs.plagiarism');
        Route::post('/davinci/configs/plagiarism', 'store')->name('admin.davinci.configs.plagiarism.store');
    }); 
});

Route::group(['prefix' => 'user', 'middleware' => ['verified', '2fa.verify', 'role:user|admin|subscriber', 'subscription.check', 'PreventBackHistory']], function() {
    // USER AI PLAGIARISM CHECKER ROUTES
    Route::controller(PlagiarismCheckerController::class)->group(function () {
        Route::get('/plagiarism', 'index')->name('user.plagiarism');           
        Route::post('/plagiarism/process', 'process');                             
    });

    // USER AI CONTENT DETECTOR ROUTES
    Route::controller(DetectorController::class)->group(function () {
        Route::get('/detector', 'index')->name('user.detector');         
        Route::post('/detector/process', 'process');                      
    });
});
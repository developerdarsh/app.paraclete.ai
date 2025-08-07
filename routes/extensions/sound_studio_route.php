<?php

use App\Http\Controllers\User\VoiceoverStudioController;
use App\Http\Controllers\Admin\Extensions\StudioSettingsController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'admin', 'middleware' => ['verified', '2fa.verify', 'role:admin', 'PreventBackHistory']], function() {
    // ADMIN SOUND STUDIO SETTINGS ROUTES
    Route::controller(StudioSettingsController::class)->group(function() {
        Route::get('/davinci/configs/sound-studio', 'index')->name('admin.davinci.configs.sound.studio');
        Route::post('/davinci/configs/sound-studio', 'store')->name('admin.davinci.configs.sound.studio.store');
        Route::get('/davinci/configs/sound-studio/audio', 'audio')->name('admin.davinci.configs.sound.audio');
        Route::get('/davinci/configs/sound-studio/audio/list', 'listAudio')->name('admin.davinci.configs.sound.audio.list');        
        Route::post('/davinci/configs/sound-studio/audio/public', 'public');  
        Route::post('/davinci/configs/sound-studio/audio/private', 'private');  
        Route::post('/davinci/configs/sound-studio/audio/upload', 'upload');  
        Route::post('/davinci/configs/sound-studio/audio/delete', 'deleteMusic');  
        Route::post('/davinci/configs/sound-studio/audio/result/delete', 'deleteResult'); 
    });
});

Route::group(['prefix' => 'user', 'middleware' => ['verified', '2fa.verify', 'role:user|admin|subscriber', 'subscription.check', 'PreventBackHistory']], function() {
    // USER AI VOICEOVER SOUND STUDIO ROUTES
    Route::controller(VoiceoverStudioController::class)->group(function() {
        Route::get('/text-to-speech/studio', 'index')->name('user.studio');
        Route::get('/text-to-speech/studio/results', 'results')->name('user.studio.results');
        Route::get('/text-to-speech/studio/result/{id}/show', 'show')->name('user.studio.show');
        Route::get('/text-to-speech/studio/result/{id}/show-studio/', 'showStudio')->name('user.studio.show.studio');
        Route::post('/text-to-speech/studio/result/delete', 'delete');
        Route::post('/text-to-speech/studio/final/result/delete', 'deleteStudioResult');  
        Route::get('/text-to-speech/studio/settings', 'settings');  
        Route::post('/text-to-speech/studio/music/merge', 'merge');  
        Route::post('/text-to-speech/studio/music/upload', 'upload');  
        Route::post('/text-to-speech/studio/music/delete', 'deleteMusic');  
        Route::get('/text-to-speech/studio/music/list', 'list')->name('user.music.list'); 
    });

});
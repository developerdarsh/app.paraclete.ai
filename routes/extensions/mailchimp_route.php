<?php

use App\Http\Controllers\Admin\Extensions\MailchimpController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'admin', 'middleware' => ['verified', '2fa.verify', 'role:admin', 'PreventBackHistory']], function() {
    Route::controller(MailchimpController::class)->group(function() {
        Route::get('/davinci/configs/mailchimp', 'index')->name('admin.davinci.configs.mailchimp');
        Route::post('/davinci/configs/mailchimp', 'store')->name('admin.davinci.configs.mailchimp.store');
    }); 
});

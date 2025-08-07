<?php

use App\Http\Controllers\Admin\FinanceSettingController;
use App\Http\Controllers\Admin\Extensions\WalletController;
use Illuminate\Support\Facades\Route;

// ADMIN FINANCE ROUTES
Route::group(['prefix' => 'admin', 'middleware' => ['verified', '2fa.verify', 'role:admin', 'PreventBackHistory']], function() {

    Route::controller(WalletController::class)->group(function() {
        Route::get('/davinci/configs/wallet', 'index')->name('admin.davinci.configs.wallet');
        Route::post('/davinci/configs/wallet', 'store')->name('admin.davinci.configs.wallet.store');
    }); 


    Route::controller(FinanceSettingController::class)->group(function() {
        Route::get('/finance/settings/wallet', 'showWallet');
        Route::post('/finance/settings/wallet', 'storeWallet')->name('admin.finance.settings.wallet.store');
    });

});



<?php

use App\Http\Controllers\Admin\Extensions\SaaSController;
use App\Http\Controllers\Admin\FinanceController;
use App\Http\Controllers\Admin\FinanceSubscriptionPlanController;
use App\Http\Controllers\Admin\FinancePrepaidPlanController;
use App\Http\Controllers\Admin\FinancePromocodeController;
use App\Http\Controllers\Admin\ReferralSystemController;
use App\Http\Controllers\Admin\FinanceSettingController;
use App\Http\Controllers\Admin\InvoiceController;
use App\Http\Controllers\Admin\Webhooks\PaypalWebhookController;
use App\Http\Controllers\Admin\Webhooks\StripeWebhookController;
use App\Http\Controllers\Admin\Webhooks\PaystackWebhookController;
use App\Http\Controllers\Admin\Webhooks\RazorpayWebhookController;
use App\Http\Controllers\Admin\Webhooks\MollieWebhookController;
use App\Http\Controllers\Admin\Webhooks\CoinbaseWebhookController;
use App\Http\Controllers\Admin\Webhooks\FlutterwaveWebhookController;
use App\Http\Controllers\Admin\Webhooks\YookassaWebhookController;
use App\Http\Controllers\Admin\Webhooks\PaddleWebhookController;
use App\Http\Controllers\Admin\Webhooks\MidtransWebhookController;
use App\Http\Controllers\User\PurchaseHistoryController;
use App\Http\Controllers\User\PlanController;
use App\Http\Controllers\User\PaymentController;
use App\Http\Controllers\User\ReferralController;
use App\Http\Controllers\User\PromocodeController;
use Illuminate\Support\Facades\Route;

// PAYMENT GATEWAY WEBHOOKS ROUTES
Route::post('/webhooks/stripe', [StripeWebhookController::class, 'handleStripe']);
Route::post('/webhooks/paypal', [PaypalWebhookController::class, 'handlePaypal']);
Route::post('/webhooks/paystack', [PaystackWebhookController::class, 'handlePaystack']);
Route::post('/webhooks/razorpay', [RazorpayWebhookController::class, 'handleRazorpay']);
Route::post('/webhooks/mollie', [MollieWebhookController::class, 'handleMollie'])->name('mollie.webhook');
Route::post('/webhooks/coinbase', [CoinbaseWebhookController::class, 'handleCoinbase']);
Route::post('/webhooks/flutterwave', [FlutterwaveWebhookController::class, 'handleFlutterwave']);
Route::post('/webhooks/yookassa', [YookassaWebhookController::class, 'handleYookassa']);
Route::post('/webhooks/paddle', [PaddleWebhookController::class, 'handlePaddle']);
Route::post('/webhooks/midtrans', [MidtransWebhookController::class, 'midtransPaddle']);

// ADMIN FINANCE ROUTES
Route::group(['prefix' => 'admin', 'middleware' => ['verified', '2fa.verify', 'role:admin', 'PreventBackHistory']], function() {
    
    Route::controller(SaaSController::class)->group(function() {
        Route::get('/davinci/configs/saas', 'index')->name('admin.davinci.configs.saas');
        Route::post('/davinci/configs/saas', 'store')->name('admin.davinci.configs.saas.store');
    }); 

    // ADMIN FINANCE - DASHBOARD & TRANSACTIONS & SUBSCRIPTION LIST ROUTES
    Route::controller(FinanceController::class)->group(function() {
        Route::get('/finance/dashboard', 'index')->name('admin.finance.dashboard');
        Route::get('/finance/transactions', 'listTransactions')->name('admin.finance.transactions');
        Route::put('/finance/transaction/{id}/update', 'update')->name('admin.finance.transaction.update');
        Route::get('/finance/transaction/{id}/show', 'show')->name('admin.finance.transaction.show');
        Route::get('/finance/transaction/{id}/edit', 'edit')->name('admin.finance.transaction.edit');
        Route::post('/finance/transaction/delete', 'delete');
        Route::get('/finance/subscriptions', 'listSubscriptions')->name('admin.finance.subscriptions');
        Route::get('/finance/report/monthly', 'monthlyReport')->name('admin.finance.report.monthly');
        Route::get('/finance/report/yearly', 'yearlyReport')->name('admin.finance.report.yearly');
        Route::post('/finance/report/notification', 'notification');
    });

    // ADMIN FINANCE - CANCEL USER SUBSCRIPTION
    Route::post('/finance/subscriptions/cancel', [PaymentController::class, 'stopSubscription'])->name('admin.stop.subscription');

    // ADMIN FINANCE - SUBSCRIPTION PLAN ROUTES
    Route::controller(FinanceSubscriptionPlanController::class)->group(function() {
        Route::get('/finance/plans', 'index')->name('admin.finance.plans');
        Route::post('/finance/plans', 'store')->name('admin.finance.plan.store');
        Route::get('/finance/plan/create', 'create')->name('admin.finance.plan.create');
        Route::get('/finance/plan/{id}/show', 'show')->name('admin.finance.plan.show');        
        Route::get('/finance/plan/{id}/edit', 'edit')->name('admin.finance.plan.edit');        
        Route::put('/finance/plan/{id}', 'update')->name('admin.finance.plan.update');
        Route::get('/finance/plan/{id}/renew', 'renew')->name('admin.finance.plan.renew');
        Route::post('/finance/plan/{id}', 'push')->name('admin.finance.plan.push');
        Route::post('/finance/plan/subscription/delete', 'delete');
    });

    // ADMIN FINANCE - PREPAID PLAN ROUTES
    Route::controller(FinancePrepaidPlanController::class)->group(function() {
        Route::get('/finance/prepaid', 'index')->name('admin.finance.prepaid');
        Route::post('/finance/prepaid', 'store')->name('admin.finance.prepaid.store');
        Route::get('/finance/prepaid/create', 'create')->name('admin.finance.prepaid.create');
        Route::get('/finance/prepaid/{id}/show', 'show')->name('admin.finance.prepaid.show');        
        Route::get('/finance/prepaid/{id}/edit', 'edit')->name('admin.finance.prepaid.edit');
        Route::put('/finance/prepaid/{id}', 'update')->name('admin.finance.prepaid.update');
        Route::post('/finance/prepaid/delete', 'delete');
    });

    // ADMIN FINANCE - PROMOCODES ROUTES
    Route::controller(FinancePromocodeController::class)->group(function() {
        Route::get('/finance/promocodes', 'index')->name('admin.finance.promocodes');
        Route::post('/finance/promocodes', 'store')->name('admin.finance.promocodes.store');
        Route::get('/finance/promocodes/create', 'create')->name('admin.finance.promocodes.create');
        Route::get('/finance/promocodes/{id}/show', 'show')->name('admin.finance.promocodes.show');
        Route::get('/finance/promocodes/{id}/edit', 'edit')->name('admin.finance.promocodes.edit');
        Route::put('/finance/promocodes/{id}', 'update')->name('admin.finance.promocodes.update');
        Route::delete('/finance/promocodes/{id}', 'destroy')->name('admin.finance.promocodes.destroy');
        Route::get('/finance/promocodes/{id}', 'delete')->name('admin.finance.promocodes.delete');
    });

    // ADMIN FINANCE - REFERRAL ROUTES
    Route::controller(ReferralSystemController::class)->group(function() {
        Route::get('/referral/settings', 'index')->name('admin.referral.settings');
        Route::post('/referral/settings', 'store')->name('admin.referral.settings.store');
        Route::get('/referral/{order_id}/show', 'paymentShow')->name('admin.referral.show');
        Route::get('/referral/payouts', 'payouts')->name('admin.referral.payouts');
        Route::get('/referral/payouts/{id}/show', 'payoutsShow')->name('admin.referral.payouts.show');
        Route::put('/referral/payouts/{id}/store', 'payoutsUpdate')->name('admin.referral.payouts.update');
        Route::get('/referral/payouts/{id}/cancel', 'payoutsCancel')->name('admin.referral.payouts.cancel');
        Route::delete('/referral/payouts/{id}/decline', 'payoutsDecline')->name('admin.referral.payouts.decline');
        Route::get('/referral/top', 'topReferrers')->name('admin.referral.top');
    });

    // ADMIN FINANCE SETTINGS ROUTES
    Route::controller(FinanceSettingController::class)->group(function() {
        Route::get('/finance/settings', 'index')->name('admin.finance.settings');
        Route::post('/finance/settings', 'store')->name('admin.finance.settings.store');
        Route::get('/finance/settings/costs', 'showCosts')->name('admin.finance.settings.costs');
        Route::post('/finance/settings/costs/store', 'storeCosts')->name('admin.finance.settings.costs.store');
    });

    // ADMIN FINANCE - INVOICE SETTINGS
    Route::controller(InvoiceController::class)->group(function() {
        Route::get('/settings/invoice', 'index')->name('admin.settings.invoice');
        Route::post('/settings/invoice', 'store')->name('admin.settings.invoice.store');
    }); 
});


// REGISTERED USER FINANCE ROUTES
Route::group(['prefix' => 'user', 'middleware' => ['verified', '2fa.verify', 'role:user|admin|subscriber', 'subscription.check', 'PreventBackHistory']], function() {

    // USER PURCHASE HISTORY ROUTES
    Route::controller(PurchaseHistoryController::class)->group(function () {     
        Route::get('/purchases', 'index')->name('user.purchases');        
        Route::get('/purchases/show/{id}', 'show')->name('user.purchases.show');
        Route::get('/purchases/subscriptions', 'subscriptions')->name('user.purchases.subscriptions');   
        Route::post('/purchases/invoice/upload', 'uploadConfirmation');   
    });

    // USER PRICING PLAN ROUTES
    Route::controller(PlanController::class)->group(function () {
        Route::get('/pricing/plans', 'index')->name('user.plans');
        Route::get('/pricing/plan/subscription/{id}', 'subscribe')->name('user.plan.subscribe'); 
        Route::get('/pricing/plan/one-time/', 'checkout')->name('user.prepaid.checkout'); 
    });

    Route::controller(PaymentController::class)->group(function() {
        Route::post('/purchases/subscriptions/cancel', 'stopSubscription');
    });

    // USER INVOICE ROUTES
    Route::controller(PaymentController::class)->group(function() {
        Route::get('/payments/invoice/{order_id}/generate', 'generatePaymentInvoice')->name('user.payments.invoice');
        Route::get('/payments/invoice/{id}/show', 'showPaymentInvoice')->name('user.payments.invoice.show');
        Route::get('/payments/invoice/{order_id}/transfer', 'bankTransferPaymentInvoice')->name('user.payments.invoice.transfer');
    });

    // USER REFERRAL ROUTES
    Route::controller(ReferralController::class)->group(function() {
        Route::get('/referral', 'index')->name('user.referral');
        Route::post('/referral/settings', 'store')->name('user.referral.store');
        Route::get('/referral/payouts', 'payouts')->name('user.referral.payout');
        Route::post('/referral/email', 'email')->name('user.referral.email');
        Route::post('/referral/payouts/store', 'payoutsStore')->name('user.referral.payout.store');
        Route::get('/referral/all', 'referrals')->name('user.referral.referrals');        
        Route::get('/referral/payouts/{id}/cancel', 'payoutsCancel')->name('user.referral.payout.cancel');
        Route::delete('/referral/payouts/{id}/decline', 'payoutsDecline')->name('user.referral.payout.decline');
    }); 

    // USER PAYMENT ROUTES
    Route::controller(PromocodeController::class)->group(function() {
        Route::post('/payments/pay/promocode/prepaid/{id}', 'applyPromocodesPrepaid')->name('user.payments.promocodes.prepaid');
        Route::post('/payments/pay/promocode/subscription/{id}', 'applyPromocodesSubscription')->name('user.payments.promocodes.subscription');
    }); 
});


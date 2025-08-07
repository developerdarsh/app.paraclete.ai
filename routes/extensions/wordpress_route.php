<?php

use App\Http\Controllers\User\WordpressController;
use App\Http\Controllers\Admin\Extensions\WordpressIntegrationController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'admin', 'middleware' => ['verified', '2fa.verify', 'role:admin', 'PreventBackHistory']], function() {
    Route::controller(WordpressIntegrationController::class)->group(function() {
        Route::get('/davinci/configs/integration/wordpress', 'index')->name('admin.davinci.configs.integration.wordpress');
        Route::post('/davinci/configs/integration/wordpress', 'store')->name('admin.davinci.configs.integration.wordpress.store');
    }); 
});

Route::group(['prefix' => 'user', 'middleware' => ['verified', '2fa.verify', 'role:user|admin|subscriber', 'subscription.check', 'PreventBackHistory']], function() {
    // USER INTEGRATION ROUTES
    Route::controller(WordpressController::class)->group(function () {          
        Route::get('/integration/wordpress', 'index')->name('user.integration.wordpress');  
        Route::get('/integration/wordpress/website/create', 'createWebsite')->name('user.integration.wordpress.website.create');  
        Route::post('/integration/wordpress/website/store', 'storeWebsite')->name('user.integration.wordpress.website.store');  
        Route::get('/integration/wordpress/website/edit/{id}', 'editWebsite')->name('user.integration.wordpress.website.edit');  
        Route::put('/integration/wordpress/website/update/{id}', 'updateWebsite')->name('user.integration.wordpress.website.update');                  
        Route::get('/integration/wordpress/website/delete/{id}', 'deleteWebsite')->name('user.integration.wordpress.website.delete');    
        Route::get('/integration/wordpress/post/create-post/{id}', 'createPost')->name('user.integration.wordpress.post.create');       
        Route::get('/integration/wordpress/post/show-post/{id}', 'showPost')->name('user.integration.wordpress.post.show');    
        Route::post('/integration/wordpress/post/store-post', 'storePost')->name('user.integration.wordpress.post.store');    
        Route::get('/integration/wordpress/post/categories/{website}', 'getCategories');    
        Route::get('/integration/wordpress/post/tags/{website}', 'getTags');    
        Route::post('/integration/wordpress/post/upload-image', 'uploadImage');    
        Route::post('/integration/wordpress/post/delete', 'deletePost');    
    });

});
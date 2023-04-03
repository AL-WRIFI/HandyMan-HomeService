<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HandymanAuth\AuthenticatedSessionController;
use App\Http\Controllers\HandymanAuth\ConfirmablePasswordController;
use App\Http\Controllers\HandymanAuth\EmailVerificationNotificationController;
use App\Http\Controllers\HandymanAuth\EmailVerificationPromptController;
use App\Http\Controllers\HandymanAuth\NewPasswordController;
use App\Http\Controllers\HandymanAuth\PasswordController;
use App\Http\Controllers\HandymanAuth\PasswordResetLinkController;
use App\Http\Controllers\HandymanAuth\RegisteredUserController;
use App\Http\Controllers\HandymanAuth\VerifyEmailController;

Route::prefix('handyman')->name('handyman.')->group(function () {
    
     
    Route::middleware('isHandyman')->group(function () { 
        Route::get('/index', App\Http\Livewire\Handyman\Index::class)->name('index');
    });

    Route::middleware('guest:handyman')->group(function () {
        Route::get('register', [RegisteredUserController::class, 'create'])
                    ->name('register');
    
        Route::post('register', [RegisteredUserController::class, 'store']);
    
        Route::get('login', [AuthenticatedSessionController::class, 'create'])
                    ->name('login');
    
        Route::post('login', [AuthenticatedSessionController::class, 'store']);
    
    });
    
    Route::middleware('auth:handyman')->group(function () {
    
        Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
                    ->name('logout');
        Route::get('/ServicePrice', App\Http\Livewire\Handyman\ServicePrice::class)->name('service.price');            
        Route::get('/WorkTime', App\Http\Livewire\Handyman\WorkTime::class)->name('work-time');
        Route::get('/ApprovedOrders', App\Http\Livewire\Handyman\ApprovedOrders::class)->name('approved-order');            
        Route::get('/OrderHistory', App\Http\Livewire\Handyman\HandymanOrderHistory::class)->name('history-orders');            
        Route::get('/HandymanProfile', App\Http\Livewire\Handyman\HandymanProfile::class)->name('shandymanprofile');            
    });
    //require __DIR__.'/handyman_auth.php';
});





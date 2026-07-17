<?php

use App\Http\Controllers\Auth\ResetPasswordByMobileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');


// Auth Routes
Route::get('/forgot_password', [ResetPasswordByMobileController::class, 'forgotPassword'])
    ->name('auth.forgot_password');
Route::post('/send_sms', [ResetPasswordByMobileController::class, 'sendSMS'])
    ->name('auth.send_sms');

Route::get('/reset_password/{mobile}', [ResetPasswordByMobileController::class, 'resetPassword'])
    ->name('auth.reset_password');
Route::post('/update_password', [ResetPasswordByMobileController::class, 'updatePassword'])
    ->name('auth.update_password');

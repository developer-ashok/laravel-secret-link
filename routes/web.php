<?php

use Illuminate\Support\Facades\Route;

// Show the secret creation form
Route::get('/', [App\Http\Controllers\SecretController::class, 'create'])->name('secret.create');

// Store the secret and return a unique link
Route::post('/secret', [App\Http\Controllers\SecretController::class, 'store'])->name('secret.store');

// View the secret (with password prompt if needed)
Route::get('/secret/{token}', [App\Http\Controllers\SecretController::class, 'show'])->name('secret.show');

// Submit password for protected secret
Route::post('/secret/{token}/auth', [App\Http\Controllers\SecretController::class, 'authenticate'])->name('secret.authenticate');

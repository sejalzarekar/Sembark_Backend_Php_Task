<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShortUrlController;
use App\Http\Controllers\InvitationController;

Route::middleware(['auth'])->group(function () {

    // Dashboard
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Short URLs
    Route::get('/short-urls', [ShortUrlController::class, 'index'])
        ->name('shorturls.index');

    Route::get('/short-urls/create', [ShortUrlController::class, 'create'])
        ->name('shorturls.create')
        ->middleware('check.role:Admin,Member');

    Route::post('/short-urls', [ShortUrlController::class, 'store'])
        ->name('shorturls.store')
        ->middleware('check.role:Admin,Member');

    // Invitations
    Route::get('/invitations/create', [InvitationController::class, 'create'])
        ->name('invitations.create')
        ->middleware('check.role:SuperAdmin,Admin');

    Route::post('/invitations', [InvitationController::class, 'store'])
        ->name('invitations.store')
        ->middleware('check.role:SuperAdmin,Admin');
});

// Public redirect
Route::get('/r/{shortCode}', [ShortUrlController::class, 'redirect']);

Route::get('/', function () {
    return view('welcome');
    // return 'hello';
});

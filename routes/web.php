<?php

use App\Livewire\Admin\Dashboard;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

Route::view('painel', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('painel');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::get("/dashboard", Dashboard::class)->name('dashboard');

require __DIR__.'/auth.php';

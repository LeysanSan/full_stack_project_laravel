<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\LinkController;

Route::get('/', [LinkController::class, 'index'])->name('links.index');
Route::get('/create', [LinkController::class, 'create'])->name('links.create');
Route::post('/store', [LinkController::class, 'store'])->name('links.store');

// Shortened redirect route
Route::get('/{slug}', [LinkController::class, 'redirect'])->name('links.redirect');
Route::delete('/links/{link}', [LinkController::class, 'destroy'])->name('links.destroy');

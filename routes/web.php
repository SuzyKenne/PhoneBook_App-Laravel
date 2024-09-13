<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\CreateController;
use App\Http\Controllers\ViewController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ContactController::class, 'index']);
Route::resource('contacts', ContactController::class);
Route::get('layouts.createContact', [CreateController::class, 'create'])->name('layouts.createContact');
Route::post('/contacts', [ContactController::class, 'store'])->name('contacts.store');
Route::get('/contacts/{contact}', [ContactController::class, 'show'])->name('contacts.show');

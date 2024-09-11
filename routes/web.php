<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\CreateController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ContactController::class, 'index']);
Route::get('layouts.createContact', [CreateController::class, 'create'])->name('layouts.createContact');
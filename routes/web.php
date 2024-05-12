<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
// use App\Http\Livewire\About;
// use App\Http\Livewire\Contact;
// use App\Http\Livewire\Home;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/home', [HomeController::class, 'render'])->name('home');
Route::get('/contact', [ContactController::class, 'render'])->name('contact');
Route::get('/about', [AboutController::class, 'render'])->name('about');

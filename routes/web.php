<?php

use App\Http\Controllers\NewsfrontendController;
use App\Http\Controllers\NewspaperController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [NewspaperController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

//Use Resource Controler for Crud operation admin panel
Route::resource('newspapers', NewspaperController::class);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//forntend Newspaper view
Route::get('/news', [NewsfrontendController::class, 'index']);

require __DIR__ . '/auth.php';

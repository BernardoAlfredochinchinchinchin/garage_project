<?php

use App\Http\Controllers\MonteurController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AfspraakController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/monteur', [MonteurController::class, 'index'])->name('monteur');
    Route::get('/afspraak', function () {
        return view('afspraak');
    });
});

//afspraak maken
Route::get('/afspraak-maken', [AfspraakController::class, 'create'])->name('afspraak.create');
Route::post('/afspraak-maken', [AfspraakController::class, 'store'])->name('afspraak.store');
require __DIR__.'/auth.php';

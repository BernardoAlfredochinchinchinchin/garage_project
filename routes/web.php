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
    //monteur
    Route::get('/monteur', [MonteurController::class, 'index'])->name('monteur');
    
    // Afspraak routes
    Route::get('/afspraak-maken', [AfspraakController::class, 'create'])->name('afspraak.create');
    Route::post('/afspraak-maken', [AfspraakController::class, 'store'])->name('afspraak.store');
    Route::get('/afspraken', [AfspraakController::class, 'index'])->name('afspraak.index'); 

    //receptionist
    Route::get('/receptionist', [AfspraakController::class, 'index'])->name('receptionist');
});

require __DIR__.'/auth.php';

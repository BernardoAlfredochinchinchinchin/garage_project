<?php

use App\Http\Controllers\MonteurController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AfspraakController;
use App\Http\Controllers\ReceptionistController;

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
    Route::post('/monteur/{afspraak}/save', [MonteurController::class, 'store'])->name('monteur.store');
    
    // Afspraak routes
    Route::get('/afspraak-maken', [AfspraakController::class, 'create'])->name('afspraak.create');
    Route::post('/afspraak-maken', [AfspraakController::class, 'store'])->name('afspraak.store');
    Route::get('/afspraken', [AfspraakController::class, 'index'])->name('afspraak.index'); 

    //receptionist
    Route::middleware(['auth'])->group(function () {
    Route::get('/receptionist', [ReceptionistController::class, 'index'])->name('receptionist');
    Route::get('/receptionist/afspraak/{afspraak}/edit', [ReceptionistController::class, 'edit'])->name('receptionist.afspraak.edit');
    Route::patch('/receptionist/afspraak/{afspraak}', [ReceptionistController::class, 'update'])->name('receptionist.afspraak.update');
    Route::patch('/receptionist/afspraak/{id}/status', [ReceptionistController::class, 'updateStatus'])->name('receptionist.afspraak.updateStatus');
    Route::delete('/receptionist/afspraak/{afspraak}', [ReceptionistController::class, 'destroy'])->name('receptionist.afspraak.destroy');
});});

require __DIR__.'/auth.php';

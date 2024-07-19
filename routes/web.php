<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\NoteController;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/note')->name('dashboard');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', 'verified'])->group(function(){
    // Route::get('/note', [NoteController::class, 'index'])->name('note.index');
    // Route::get('/note/create', [WelcomeController::class, 'create'])->name('note.create');
    // Route::post('/note', [WelcomeController::class, 'store'])->name('note.store');
    // Route::get('/note/{id}', [WelcomeController::class, 'show'])->name('note.show');
    // Route::get('/note/{id}/edit', [WelcomeController::class, 'edit'])->name('note.edit');
    // Route::put('/note/{id}', [WelcomeController::class, 'update'])->name('note.update');
    // Route::delete('/note/{id}', [WelcomeController::class, 'destroy'])->name('note.destroy');

    Route::resource('note', NoteController::class); 
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

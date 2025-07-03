<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\NoteController; // import this
use App\Models\Note;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    $notes = Note::where('user_id', auth()->id())->get();
    return view('notes.index', compact('notes'));
})->middleware(['auth'])->name('dashboard');

// Authenticated only routes
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Admin only routes
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin', function () {
        return view('admin');
    })->name('admin');
});

// Notes routes
Route::middleware(['auth'])->group(function () {
    Route::resource('notes', NoteController::class)->only([
        'index', 'store', 'update', 'destroy'
    ]);
});


require __DIR__.'/auth.php';

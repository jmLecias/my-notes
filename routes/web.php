<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\NoteController; // import this
use App\Models\Note;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/dashboard', function () {
//     $notes = Note::where('user_id', auth()->id())->get();
//     return view('notes.index', compact('notes'));
// })->middleware(['auth'])->name('dashboard');

// Post-Authentication route
Route::get('/dashboard', function () {
    return view('dashboard');
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

// // Notes routes
// Route::middleware(['auth'])->group(function () {
//     Route::resource('notes', NoteController::class);
// });

// Notes route spread-out version
Route::middleware(['auth'])->group(function () {
    // List all notes
    Route::get('/notes', [NoteController::class, 'index'])->name('notes.index');

    // Show form to create a new note
    Route::get('/notes/create', [NoteController::class, 'create'])->name('notes.create');

    // Store a new note
    Route::post('/notes', [NoteController::class, 'store'])->name('notes.store');

    // Show a specific note (optional if unused)
    Route::get('/notes/{note}', [NoteController::class, 'show'])->name('notes.show');

    // Show form to edit a note
    Route::get('/notes/{note}/edit', [NoteController::class, 'edit'])->name('notes.edit');

    // Update a note
    Route::put('/notes/{note}', [NoteController::class, 'update'])->name('notes.update');

    // Delete a note
    Route::delete('/notes/{note}', [NoteController::class, 'destroy'])->name('notes.destroy');
});


require __DIR__.'/auth.php';

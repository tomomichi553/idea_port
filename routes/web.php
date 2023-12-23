<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\IdeaController;
use Illuminate\Support\Facades\Route;




Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::middleware('auth')->group(function () {
    Route::get('/',[IdeaController::class,'ideaIndex']);
    Route::get('/ideas/create',[IdeaController::class,'ideaCreate']);
    Route::post('/ideas/',[IdeaController::class,'ideaStore']);
    Route::get('/ideas/{idea}',[IdeaController::class,'ideaShow']);
    
    Route::post('/troubles/',[IdeaController::class,'troubleStore']);
    Route::get('/troubles/create',[IdeaController::class,'troubleCreate']);
    Route::get('/troubles/{trouble}',[IdeaController::class,'troubleShow']);
    
    
});

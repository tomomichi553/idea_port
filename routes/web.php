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
    Route::get('/profile/post',[ProfileController::class,'post'])->name('profile.post');
    
});

require __DIR__.'/auth.php';

Route::middleware('auth')->group(function () {
    Route::get('/',[IdeaController::class,'ideaIndex']);
    
    Route::get('/ideas/create',[IdeaController::class,'ideaCreate']);
    Route::get('ideas/search',[IdeaController::class,'ideaSearch']);
    Route::post('/ideas/',[IdeaController::class,'ideaStore']);
    Route::post('/ideas/comments',[IdeaController::class,'ideaComment']);
    Route::get('/ideas/{idea}/edit',[ideaController::class,'ideaEdit']);
    Route::put('/ideas/{idea}',[IdeaController::class,'ideaUpdate']);
    Route::get('/ideas/{idea}',[IdeaController::class,'ideaShow']);
    Route::delete('/ideas/{idea}',[IdeaController::class,'ideaDelete']);
    
    Route::post('/troubles/',[IdeaController::class,'troubleStore']);
    Route::post('/troubles/comments',[IdeaController::class,'troubleComment']);
    Route::get('/troubles/create',[IdeaController::class,'troubleCreate']);
    Route::get('troubles/search',[IdeaController::class,'troubleSearch']);
    Route::get('/troubles/{trouble}/edit',[IdeaController::class,'troubleEdit']);
    Route::put('/troubles/{trouble}',[IdeaController::class,'troubleUpdate']);
    Route::get('/troubles/{trouble}',[IdeaController::class,'troubleShow']);
    Route::delete('/troubles/{trouble}',[IdeaController::class,'troubleDelete']);
    
    
});

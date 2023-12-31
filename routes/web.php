<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\IdeaController;
use App\Http\Controllers\TroubleController;
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
    Route::delete('/ideas/comments/{comment}',[IdeaController::class,'ideaCommentDelete']);
    
    Route::post('/troubles/',[TroubleController::class,'troubleStore']);
    Route::post('/troubles/comments',[TroubleController::class,'troubleComment']);
    Route::get('/troubles/create',[TroubleController::class,'troubleCreate']);
    Route::get('troubles/search',[TroubleController::class,'troubleSearch']);
    Route::get('/troubles/{trouble}/edit',[TroubleController::class,'troubleEdit']);
    Route::put('/troubles/{trouble}',[TroubleController::class,'troubleUpdate']);
    Route::get('/troubles/{trouble}',[TroubleController::class,'troubleShow']);
    Route::delete('/troubles/{trouble}',[TroubleController::class,'troubleDelete']);
    Route::delete('/troubles/comments/{comment}',[TroubleController::class,'troubleCommentDelete']);
    
    Route::post('s3',[S3Controller::class,'uploadS3'])->name('s3');
});

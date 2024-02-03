<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\IdeaController;
use App\Http\Controllers\TroubleController;
use App\Http\Controllers\IdeaLikeController;
use App\Http\Controllers\TroubleLikeController;
use Illuminate\Support\Facades\Route;




Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/profile/post/{user}',[ProfileController::class,'post'])->name('profile.post');
    Route::get('/profile/like',[ProfileController::class,'like']);
    Route::get('/profile/{user}',[ProfileController::class,'show'])->name('profile.show');
    
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
    
    Route::post('/ideas/like', [IdeaLikeController::class, 'like'])->name('ideas.like');
    
    
    
    Route::get('/troubles/like/{trouble}',[TroubleLikeController::class,'like'])->name('trouble_like');
    Route::get('/troubles/unlike/{trouble}',[TroubleLikeController::class,'unlike'])->name('trouble_unlike');

    Route::post('s3',[S3Controller::class,'uploadS3'])->name('s3');
});

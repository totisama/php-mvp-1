<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', WelcomeController::class)->name('welcome');

Route::get('articles/', [ArticleController::class, 'index'])->name('articles.index');

Route::get('articles/{id}', [ArticleController::class, 'show'])->name('articles.show');

// Authenticated routes
Route::prefix('user')->middleware(['auth', 'verified'])->name('user.')->group(function () {
    Route::resource('articles', App\Http\Controllers\User\ArticleController::class);
    Route::get('articles/{id}/publish', App\Http\Controllers\User\ArticlePublishController::class)->name('articles.publish');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Question;
use App\Http\Controllers\QuestionController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    if (app()->isLocal()) {
        auth()->loginUsingId(1);

        return to_route('dashboard');
    }

    return view('welcome');
});

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::post('/question/store', [QuestionController::class, 'store'])->name('question.store');
Route::post('/question/like/{question}', [Question\LikeController::class, '__invoke'])->name('question.like');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

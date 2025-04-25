<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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

    Route::resource('users', \App\Http\Controllers\UserController::class);
    Route::resource('jobs', \App\Http\Controllers\JobController::class);
    Route::resource('applications', \App\Http\Controllers\ApplicationController::class);
    Route::resource('skills', \App\Http\Controllers\SkillController::class);
    Route::resource('messages', \App\Http\Controllers\MessageController::class);

});

require __DIR__.'/auth.php';

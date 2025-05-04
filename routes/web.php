<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

// Auth route
require __DIR__.'/auth.php';

// Landing page
Route::get('/', function () {
    return view('welcome');
});

// Redirect based on user role
Route::get('/dashboard', function () {
    $user = Auth::user();

    switch ($user->role) {
        case 'admin':
            return redirect()->route('admin.users.index'); 
        case 'recruiter':
            return redirect()->route('recruiter.dashboard'); 
        case 'user':
            return redirect()->route('candidat.dashboard'); 
        default:
            abort(403, 'Unauthorized');
    }
})->middleware(['auth'])->name('dashboard');

// Admin
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\Admin\AdminJobController;
use App\Http\Controllers\Admin\AdminApplicationController;
use App\Http\Controllers\Admin\AdminMessageController;
use App\Http\Controllers\Admin\AdminInterviewController;
use App\Http\Controllers\Admin\AdminNotificationController;

Route::prefix('admin')->middleware(['auth', 'is_admin'])->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'dashboard'])->name('dashboard');
    Route::resource('users', AdminUserController::class);
    Route::resource('jobs', AdminJobController::class);
    Route::resource('applications', AdminApplicationController::class);
    Route::resource('messages', AdminMessageController::class);
    Route::resource('interviews', AdminInterviewController::class);
    Route::resource('notifications', AdminNotificationController::class);
});

// Recruiter
use App\Http\Controllers\Recruiter\RecruiterDashboardController;
use App\Http\Controllers\Recruiter\RecruiterApplicationController;
use App\Http\Controllers\Recruiter\RecruiterJobController;
use App\Http\Controllers\Recruiter\RecruiterMessageController;

Route::prefix('recruiter')->middleware(['auth', 'is_recruiter'])->name('recruiter.')->group(function () {
    Route::get('/dashboard', [RecruiterDashboardController::class, 'index'])->name('dashboard');
    Route::resource('applications', RecruiterApplicationController::class);
    Route::resource('jobs', RecruiterJobController::class);
    Route::resource('messages', RecruiterMessageController::class);
});

// Candidat
use App\Http\Controllers\Candidat\CandidatDashboardController;
use App\Http\Controllers\Candidat\CandidatApplicationController;
use App\Http\Controllers\Candidat\CandidatMessageController;
use App\Http\Controllers\Candidat\CandidatProfileController;

Route::prefix('candidat')->middleware(['auth', 'is_user'])->name('candidat.')->group(function () {
    Route::get('/dashboard', [CandidatDashboardController::class, 'index'])->name('dashboard');
    Route::resource('applications', CandidatApplicationController::class);
    Route::resource('messages', CandidatMessageController::class);
    Route::resource('profile', CandidatProfileController::class)->only(['index', 'edit', 'update','show']);
});

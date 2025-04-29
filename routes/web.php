<?php


use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    $user = auth()->user();

    if ($user->is_admin) {
        return redirect()->route('admin.dashboard');
    } elseif ($user->is_recruiter) {
        return redirect()->route('recruiter.dashboard');
    } else {
        return redirect()->route('candidat.dashboard');
    }
})->middleware(['auth'])->name('dashboard');



//Admin
use App\Http\Controllers\Admin\ApplicationController as AdminApplicationController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\InterviewController as AdminInterviewController;
use App\Http\Controllers\Admin\JobController as AdminJobController;
use App\Http\Controllers\Admin\MessageController as AdminMessageController;
use App\Http\Controllers\Admin\NotificationController as AdminNotificationController;
use App\Http\Controllers\Admin\UserController as AdminUserController;

//Candidat
use App\Http\Controllers\Candidat\ApplicationController as CandidatApplicationController;
use App\Http\Controllers\Candidat\DashboardController as CandidatDashboardController;
use App\Http\Controllers\Candidat\MessageController as CandidatMessageController;
use App\Http\Controllers\Candidat\ProfileController as CandidatProfileController;

//Recruiter
use App\Http\Controllers\Recruiter\ApplicationController as RecruiterApplicationController;
use App\Http\Controllers\Recruiter\DashboardController as RecruiterDashboardController;
use App\Http\Controllers\Recruiter\JobController as RecruiterJobController;
use App\Http\Controllers\Recruiter\MessageController as RecruiterMessageController;


Route::prefix('admin')->middleware(['auth', 'is_admin'])->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
    Route::resource('users', AdminUserController::class);
    Route::resource('jobs', AdminJobController::class);
    Route::resource('applications', AdminApplicationController::class);
    Route::resource('messages', AdminMessageController::class);
    Route::resource('interviews', AdminInterviewController::class);
    Route::resource('notifications', AdminNotificationController::class);
});


Route::prefix('recruiter')->middleware(['auth', 'is_recruiter'])->name('recruiter.')->group(function () {
    Route::get('/dashboard', [RecruiterDashboardController::class, 'index'])->name('dashboard');
    Route::resource('applications', RecruiterApplicationController::class);
    Route::resource('jobs', RecruiterJobController::class);
    Route::resource('messages', RecruiterMessageController::class);
});


Route::prefix('candidat')->middleware(['auth', 'is_user'])->name('candidat.')->group(function () {
    Route::get('/dashboard', [CandidatDashboardController::class, 'index'])->name('dashboard');
    Route::resource('applications', CandidatApplicationController::class);
    Route::resource('messages', CandidatMessageController::class);
    Route::resource('profile', CandidatProfileController::class)->only(['index', 'edit', 'update']);
});


// Auth
require __DIR__.'/auth.php';

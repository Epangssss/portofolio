<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ContactController;

Route::get('/', function () {
    $projects = \App\Models\Project::latest()->get();
    return view('welcome', compact('projects'));
});

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login/send-otp', [AuthController::class, 'sendOtp'])->name('login.send-otp');
Route::post('/login/verify-otp', [AuthController::class, 'verifyOtp'])->name('login.verify-otp');

// Contact Form
Route::post('/contact', [ContactController::class, 'sendMessage'])->name('contact.send');

// Admin Routes
Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
Route::post('/admin/projects', [AdminController::class, 'storeProject'])->name('admin.projects.store');
Route::delete('/admin/projects/{id}', [AdminController::class, 'deleteProject'])->name('admin.projects.delete');
Route::post('/admin/logout', [AdminController::class, 'logout'])->name('admin.logout');

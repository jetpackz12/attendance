<?php

use App\Http\Controllers\AttendanceController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PupilController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\UserController;

Route::get('/', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('loginlogin');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::middleware(['AuthenticatedUser'])->prefix('dashboard')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
});

Route::middleware(['AuthenticatedUser'])->prefix('upload_attendance')->group(function () {
    Route::get('/', [AttendanceController::class, 'index'])->name('upload_attendance');
    Route::get('/edit', [AttendanceController::class, 'edit'])->name('upload_attendance_edit');
    Route::post('/update', [AttendanceController::class, 'update'])->name('upload_attendance_update');
    Route::post('/save', [AttendanceController::class, 'save'])->name('upload_attendance_save');
    Route::post('/destroy', [AttendanceController::class, 'destroy'])->name('upload_attendance_destroy');
    Route::post('/destroy_all', [AttendanceController::class, 'destroyAll'])->name('upload_attendance_destroy_all');
    Route::post('/attendance-import', [AttendanceController::class, 'import'])->name('upload_attendance_import');
});

Route::middleware(['AuthenticatedUser'])->prefix('attendance_tracker')->group(function () {
    Route::get('/', [AttendanceController::class, 'indexAttendanceTracker'])->name('attendance_tracker');
    Route::get('/show', [AttendanceController::class, 'showAttendanceTracker'])->name('attendance_tracker_show');
});

Route::middleware(['AuthenticatedUser'])->prefix('teacher_management')->group(function () {
    Route::get('/', [TeacherController::class, 'index'])->name('teacher_management');
    Route::post('/store', [TeacherController::class, 'store'])->name('teacher_management_store');
    Route::get('/edit', [TeacherController::class, 'edit'])->name('teacher_management_edit');
    Route::post('/update', [TeacherController::class, 'update'])->name('teacher_management_update');
    Route::post('/destroy', [TeacherController::class, 'destroy'])->name('teacher_management_destroy');
});

Route::middleware(['AuthenticatedUser'])->prefix('pupil_management')->group(function () {
    Route::get('/', [PupilController::class, 'index'])->name('pupil_management');
    Route::post('/store', [PupilController::class, 'store'])->name('pupil_management_store');
    Route::get('/edit', [PupilController::class, 'edit'])->name('pupil_management_edit');
    Route::post('/update', [PupilController::class, 'update'])->name('pupil_management_update');
    Route::post('/destroy', [PupilController::class, 'destroy'])->name('pupil_management_destroy');
});

Route::middleware(['AuthenticatedUser'])->get('/reports', [ReportController::class, 'index'])->name('reports');

Route::middleware(['AuthenticatedUser'])->prefix('users')->group(function () {
    Route::get('/', [UserController::class, 'index'])->name('users');
    Route::post('/store', [UserController::class, 'store'])->name('users_store');
    Route::get('/edit', [UserController::class, 'edit'])->name('users_edit');
    Route::post('/update', [UserController::class, 'update'])->name('users_update');
    Route::post('/destroy', [UserController::class, 'destroy'])->name('users_destroy');
});

<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\InstructorController;
use App\Http\Controllers\StudentController;
use App\Models\Instructor;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('welcome');
})->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('dashboard', function () {
        return Inertia::render('dashboard');
    })->name('dashboard');
});

Route::controller(StudentController::class)->group(function() {
    Route::get('/students', 'index')->name('students.index');
    Route::get('/students/create', 'create_view')->name('students.create.index');
    Route::post('/students/create', 'create')->name('students.create');
});

Route::controller(DepartmentController::class)->group(function() {
    Route::get('/departments', 'index')->name('departments.index');
    Route::get('/departments/create', 'create_view')->name('departments.create.index');
    Route::post('/departments/create', 'create')->name('departments.create');
});

Route::controller(InstructorController::class)->group(function() {
    Route::get('/instructors', 'index')->name('instructors.index');
    Route::get('/instructors/create', 'create_view')->name('instructors.create.index');
    Route::post('/instructors/create', 'create')->name('instructors.create');
});

Route::controller(CourseController::class)->group(function() {
    Route::get('/courses', 'index')->name('courses.index');
    Route::get('/courses/create', 'create_view')->name('courses.create.index');
    Route::post('/courses/create', 'create')->name('courses.create');
});

require __DIR__.'/settings.php';
require __DIR__.'/auth.php';

<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Teachers;
use App\Http\Controllers\Students;
use App\Http\Controllers\Subjects;
use App\Http\Controllers\Sections;
use App\Http\Controllers\Strands;
use App\Http\Controllers\Auth;
use App\Http\Controllers\ExcelImportController;

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/register', function () { 
    return view('auth.register');
});

Route::get('/user', function () {
    return view('layout.type');
});


Route::get('/user', function () {
    return view('layout.type');
});

Route::get('/user/student', [Students::class, 'confirmation']);
Route::post('/user/student/confirm', [Students::class, 'register'])->name('student.confirm');

Route::get('/user/teacher', [Teachers::class, 'confirmation']);
Route::post('/user/teacher/confirm', [Teachers::class, 'register'])->name('teacher.confirm');
Route::post('/user/teacher/update', [Teachers::class, 'update'])->name('teacher.update');

// Teacher Controller
Route::get('/teachers', [Teachers::class, 'list']);
Route::get('/teacher/section/{id}', [Teachers::class, 'subjects']);
Route::get('/teachers/register', [Teachers::class, 'registration']);

// Teacher > Advisory 
Route::get('/teacher/advisory', [Teachers::class, 'advisory']);
Route::get('/teacher/advisory/list/{id}', [Teachers::class, 'advisory_list']);

Route::get('/teacher/details/{id}', [Teachers::class, 'details']);
Route::get('/teacher/students/{sec}/{subj}', [Teachers::class, 'grade']);
Route::get('/teacher/attendance/{sec}/{subj}/{quarter}', [Teachers::class, 'attendance']);
Route::get('/teacher/137/{sec}', [Teachers::class, 'form137']);

// Student Controller
Route::get('/students', [Students::class, 'list']);
Route::get('/students/details/{id}', [Students::class, 'details']);
Route::get('/students/search/{id}', [Students::class, 'search']);
Route::get('/students/register', [Students::class, 'registration']);
Route::post('/student/confirm', [Students::class, 'register'])->name('student.confirm');
Route::post('/student/update', [Students::class, 'update'])->name('student.update');

// Section Controller
Route::get('/sections', [Sections::class, 'list']);
Route::get('/sections/view/{id}', [Sections::class, 'details']);
Route::get('/sections/search/{id}', [Sections::class, 'search']);
Route::get('/sections/import/{id}', [Sections::class, 'import']);
Route::get('/sections/edit/{id}', [Sections::class, 'edit']);
Route::get('/sections/register', [Sections::class, 'registration']);
Route::post('/sections/update', [Sections::class, 'update'])->name('section.update');
Route::post('/sections/assign', [Sections::class, 'assign'])->name('teacher.assign');

// Assign Subject Teacher
Route::get('/assign/teacher', [Subjects::class, 'assign']);
Route::post('/assign/subject', [Teachers::class, 'assign_subject'])->name('assign.subject');

Route::get('/generate/137', function(){
    return view('layout.form137');
});

Route::get('/generate/138', function(){
    return view('layout.form138');
});

Route::get('/strands', [Strands::class, 'list']);

// Subject Controller
Route::get('/subjects', [Subjects::class, 'list']);
Route::get('/subject/view/{id}', [Subjects::class, 'details']);
Route::get('/subject/register', [Subjects::class, 'registration']);
Route::post('/subject/update', [Subjects::class, 'update'])->name('update.course');
Route::post('/subject/confirm', [Subjects::class, 'save'])->name('create.course');

Route::post('/login', [Auth::class, 'login'])->name('login');
Route::post('/register', [Auth::class, 'register'])->name('register');
Route::get('/logout', [Auth::class, 'logout']);

Route::post('/create-course', [Subjects::class, 'save'])->name('create.course');
Route::post('/create-section', [Sections::class, 'save'])->name('create.section');

Route::get('/user/teacher/section/{id}', [Teachers::class, 'subjects']);
Route::get('/user/teacher/import/{id}', [Teachers::class, 'import']);


Route::get('/teacher/subject/{subject}/{section}/{quarter}', [Teachers::class, 'students']);

// Import Excel
Route::post('import/excel', [ExcelImportController::class, 'import'])->name('import.excel');

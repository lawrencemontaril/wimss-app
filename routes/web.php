<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\DeanController;
use App\Http\Controllers\FacultyController;
use App\Http\Controllers\GradeStudentController;
use App\Http\Controllers\GuardianController;
use App\Http\Controllers\HeiController;
use App\Http\Controllers\HteController;
use App\Http\Controllers\RecommendationController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
| -------------
|  Home routes
| -------------
*/
Route::view('/', 'pages.welcome')
    ->name('index');
Route::view('/sign_in', 'pages.sign_in')
    ->name('sign_in');
Route::post('/sign_in', [AuthController::class, 'sign_in'])
    ->name('sign_in.post');
Route::post('/sign_out', [AuthController::class, 'sign_out'])
    ->name('sign_out');

/*
| ----------------------
|  Authenticated routes
| ----------------------
*/
Route::middleware(['auth'])->group(function () {
    /*
    | ------------------
    |  Analytics routes
    | ------------------
    */
    Route::get('dashboard/', [DashboardController::class, 'dashboard'])
        ->name('dashboard');

    /*
    | -------------
    |  User routes
    | -------------
    */
    Route::get('@{user:username}', [UserController::class, 'show'])
        ->name('users.show');
    Route::get('@{user:username}/edit', [UserController::class, 'edit'])
        ->name('users.edit');
    Route::put('@{user:username}', [UserController::class, 'update'])
        ->name('users.update');

    /*
    | ---------------
    |  Course routes
    | ---------------
    */
    Route::resource('courses', CourseController::class);

    /*
    | -----------------------
    |  Recommendation routes
    | -----------------------
    */
    Route::resource('recommendations', RecommendationController::class)
        ->except(['show', 'create', 'destroy']);

    /*
    | ------------
    |  HEI routes
    | ------------
    */
    Route::resource('heis', HeiController::class);

    /*
    | -------------
    |  Dean routes
    | -------------
    */
    Route::resource('deans', DeanController::class)
        ->except(['update', 'edit']);

    /*
    | ----------------
    |  Faculty routes
    | ----------------
    */
    Route::resource('faculties', FacultyController::class)
        ->except(['update', 'edit']);

    /*
    | ------------
    |  HTE routes
    | ------------
    */
    Route::resource('htes', HteController::class)
        ->except(['update', 'edit']);

    /*
    | ----------------
    |  Student routes
    | ----------------
    */
    Route::get('students/export', [StudentController::class, 'export'])
        ->name('students.export');
    Route::get('students/import', [StudentController::class, 'import'])
        ->name('students.import');
    Route::post('students/import', [StudentController::class, 'importStore'])
        ->name('students.import-post');
    Route::get('students/{student}/grades', [GradeStudentController::class, 'show'])
        ->name('students.grades-show');
    Route::get('students/{student}/grades/create', [GradeStudentController::class, 'create'])
        ->name('students.grades-create');
    Route::put('students/{student}/grades', [GradeStudentController::class, 'update'])
        ->name('students.grades-update');
    Route::resource('students', StudentController::class)
        ->except(['update', 'edit']);

    /*
    | -----------------
    |  Guardian routes
    | -----------------
    */
    Route::resource('guardians', GuardianController::class)
        ->except(['update', 'edit']);
});

/*
| --------------------
|  CSRF Token refresh
| --------------------
*/
Route::get('/refresh-csrf', function () {
    return response()->json(['csrf_token' => csrf_token()]);
});

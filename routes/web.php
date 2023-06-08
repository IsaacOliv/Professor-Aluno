<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\ActivitiesController;
use App\Http\Controllers\ActivitiesResponsesController;
use App\Http\Controllers\DisciplinesController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\StudentsController;
use App\Http\Controllers\TeachersController;


use Illuminate\Support\Facades\Route;

Route::controller(IndexController::class)->group(function () {
    Route::get('/account', 'account')->name('account');
});
Route::controller(AccountController::class)->group(function () {
    //Teacher
    Route::get('/teacher/login', 'loginTeacher')->name('login');
    Route::post('/logar', 'logarTeacher')->name('logar');
    Route::get('/teacher/register', 'registerTeacher')->name('register');
    Route::post('/register', 'createTeacher')->name('create');

    
    //student
    Route::get('/students/login', 'loginStudent')->name('students.login');
    Route::post('/students/logar', 'logarStudent')->name('students.authenticate');


    //logout Teacher/Student
    Route::get('/logout', 'logout')->name('logout');
});

// ver kernel.php para middleware
Route::middleware(['authTS'])->group(function () {

    Route::controller(IndexController::class)->group(function () {
        Route::get('/', 'index')->name('index');
    });
    Route::controller(DisciplinesController::class)->group(function () {
        Route::get('/disciplines/all', 'allData')->name('disciplines.allData');
        Route::get('/disciplines', 'index')->name('disciplines.index');
    });
    Route::controller(ActivitiesController::class)->group(function () {
        Route::get('/activities', 'index')->name('activities.index');
        Route::get('/disciplines/{id}/activities', 'showWhere')->name('activities.showWhere');
        Route::get('/activities/show/{id}', 'show')->name('activities.show');
    });
    Route::controller(StudentsController::class)->group(function () {
        Route::get('/students/{id}', 'info')->name('students.info');
    });
    Route::controller(ActivitiesResponsesController::class)->group(function(){
        Route::get('/students/disciplines/{id}/activities', 'activities')->name('students.activities');
        Route::get('/students/disciplines/activities/{id}/responses', 'responses')->name('students.responses');
        Route::post('/students/disciplines/activities/responses', 'store')->name('students.store');
        Route::get('/students/activities/open', 'open')->name('students.activities.open');
        Route::get('/students/activities/edit/{id}', 'edit')->name('students.edit');
        Route::get('/students/activities/where/{id}', 'editWhere')->name('students.edit.where');
        Route::put('/students/activities/update/{id}', 'update')->name('students.activitie.update');
    });
    
});

Route::middleware(['teachers'])->group(function () {

    Route::controller(DisciplinesController::class)->group(function () {

        Route::delete('/disciplines/destroy/{id}', 'deleteData')->name('disciplines.deleteData');
        Route::get('/disciplines/create', 'create')->name('disciplines.create');
        Route::post('/disciplines/create/store', 'store')->name('disciplines.store');
        Route::get('/disciplines/edit/{id}', 'edit')->name('disciplines.edit');
        Route::put('/disciplines/update/{id}', 'update')->name('disciplines.update');
        // Route::post('/disciplines/destroy/{id}', 'destroy')->name('disciplines.destroy');    <--- trocado por deleteData

    });
    Route::controller(TeachersController::class)->group(function () {
        Route::get('/teacher/{id}', 'info')->name('teacher.info');
        Route::get('/teatcher/student-register', 'studentRegister')->name('create.student');
        Route::post('/teatcher/student-register', 'studentStore')->name('store.student');
        Route::get('/teacher/show/students', 'studentsShow')->name('teacher.show.student');
        Route::get('/teacher/student/edit/{id}', 'studentEdit')->name('teacher.edit.student');
        Route::put('/teacher/student/edit/{id}/update', 'studentUpdate')->name('teacher.update.student');
        Route::put('/teacher/student/edit/{id}/status', 'disableStudent')->name('teacher.update.status');

    });
    Route::controller(ActivitiesController::class)->group(function () {
        Route::get('/activities/create/{id}', 'create')->name('activities.create');
        Route::post('/activities/store', 'store')->name('activities.store');
        Route::delete('/activities/destroy/{id}', 'deleteActivitie')->name('activities.destroy');
        Route::get('/activities/check/{id}','check')->name('activities.check');
        Route::get('/activities/check/avaliate/{id}', 'avaliate')->name('teacher.avaliate');
        Route::put('/activities/check/avaliate/avaliate/{id}', 'activitieAvaliate')->name('teacher.avaliate.activitie');
    });
});

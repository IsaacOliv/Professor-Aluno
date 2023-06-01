<?php

use App\Http\Controllers\AccountStudents;
use App\Http\Controllers\AccountTeachers;
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
Route::controller(AccountTeachers::class)->group(function () {
    //professor 
    Route::get('/teacher/login', 'login')->name('login');
    Route::post('/logar', 'logar')->name('logar');
    Route::get('/logout', 'logout')->name('logout');
    Route::get('/teacher/register', 'register')->name('register');
    Route::post('/register', 'create')->name('create');
    //professor 

});
Route::controller(AccountStudents::class)->group(function () {
    //aluno
    Route::get('/students/login', 'login')->name('students.login');
    Route::post('/students/logar', 'logar')->name('students.authenticate');
    //Aluno utiliza logout de accountTeachers para facilitar
    //aluno

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
        Route::get('/students/disciplines/{id}/activities', 'activities')->name('students.activities');
        Route::get('/students/disciplines/activities/{id}/responses', 'responses')->name('students.responses');
        Route::post('/students/disciplines/activities/responses', 'responsesStore')->name('students.responsesStore');
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
    });
    Route::controller(ActivitiesController::class)->group(function () {
        Route::get('/activities/create/{id}', 'create')->name('activities.create');
        Route::post('/activities/store', 'store')->name('activities.store');
        Route::delete('/activities/destroy/{id}', 'deleteActivitie')->name('activities.destroy');
    });
});
// Route::controller(ActivitiesResponsesController::class)->group(function(){
//     Route::get('/', '*');
//     Route::post('/', '*');
// });

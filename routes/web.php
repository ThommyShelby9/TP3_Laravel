<?php

use App\Http\Controllers\AffectationController;
use App\Http\Controllers\AtributtionController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CoursController;
use App\Http\Controllers\ListeController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::controller(ListeController::class)->middleware('auth')->group(function () {

    Route::get('/', 'index')->name('index');

    Route::get('/addetudiant/{id}', 'add')->name('etudiant');

    Route::get('/add_etudiant', 'addStudent')->name('addEtudiant');

    Route::get('/{id}', 'delete')->name('delete');

    Route::post('/addetudiant', 'store')->name('getetudiant');

    Route::get('/modifyStudent/{id}', 'getStudentInfo')->name('getStudentInfo');

    Route::post('/modifyStudent/{id}', 'modifyStudentInfo')->name('modifyStudent');
});

Route::controller(UserController::class)->prefix('user')->group(function () {
    Route::get('/login', 'login')->name('login');

    Route::get('/logout', 'logout')->name('logout');

    Route::get('register', 'register')->name('register');

    Route::get('/logout', 'logout')->name('logout');

    Route::post('/login', 'authentification')->name('authentification');

    Route::get('/register', 'register')->name('register');

    Route::get('/email_verify', 'email_verify')->name('email_verify');

    Route::post('/emailVerify/verify_email', 'emailVerify')->name('emailVerify');

    Route::post('/store/register', 'store')->name('storeUser');

    Route::get('/verify_email/{email}', 'verify')->name('email_verified');

    Route::get('.verify_email/{email}', 'modify_pass')->name('modify_pass');

    Route::post('/modify_password/password_modification', 'modify_password')->name('modify_password');
});


Route::controller(CategoryController::class)->prefix('categorie')->group(function () {
    Route::get('/category', 'addCategory')->name('addCategory');
});

Route::controller(CoursController::class)->prefix('cours')->group(function () {

    Route::get('/cours', 'cours')->name('cours');

    Route::get('/addCourse', 'course_view')->name('course_view');

    Route::post('/add_course/addCourse', 'add_course')->name('addCourse');
});

Route::controller(AtributtionController::class)->prefix('attribute')->group(function(){

    Route::get('/attribution_cours', 'see_attribution')->name('view_attribution');

    Route::post('/attribution_cours', 'get_attribute')->name('get_attribute');
});

Route::controller(TeacherController::class)->prefix('teacher')->group(function(){

    Route::get('/teacher', 'see_teacher')->name('see_teacher');

    Route::get('/teacher_form', 'see_teacher_form')->name('see_teacher_form');

    Route::post('/send_teacher/teacher', 'send_teacher')->name('send_teacher');

    Route::get('/affectation/{id}', 'set_affect')->name('affectation');

});

Route::controller(AffectationController::class)->prefix('affectations')->group(function(){
    Route::post('/affectation/{id}', 'get_affectation')->name('get_affectation');
});

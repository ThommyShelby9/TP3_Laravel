<?php
use App\Http\Controllers\ListeController ;
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

Route::get('/', [ListeController::class, 'index'])->name('index');

Route::get('/addetudiant/{id}', [ListeController::class, 'add'])->name('etudiant');

Route::get('/add_etudiant', [ListeController::class, 'addStudent'])->name('addEtudiant');

Route::get('/{id}', [ListeController::class, 'delete'])->name('delete'); 

Route::post('/addetudiant', [ListeController::class, 'store'])->name('getetudiant');

Route::get('/modifyStudent/{id}', [ListeController::class, 'getStudentInfo'])->name('getStudentInfo');

Route::post('/modifyStudent/{id}', [ListeController::class, 'modifyStudentInfo'])->name('modifyStudent');

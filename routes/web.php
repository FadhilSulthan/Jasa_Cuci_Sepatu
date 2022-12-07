<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\costumerController;
use App\Http\Controllers\JasaCuciController;
use App\Http\Controllers\petugasController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/costumer', [costumerController::class, 'index'])->name('costumer.index');
Route::get('/costumer/add', [costumerController::class, 'create'])->name('costumer.create');
Route::post('/costumer/store', [costumerController::class, 'store'])->name('costumer.store');
Route::get('/costumer/edit/{id}', [costumerController::class, 'edit'])->name('costumer.edit');
Route::post('/costumer/update/{id}', [costumerController::class, 'update'])->name('costumer.update');
Route::post('/costumer/delete/{id}', [costumerController::class, 'delete'])->name('costumer.delete');
Route::get('/costumer/search', [costumerController::class, 'search'])->name('costumer.search');
Route::get('/costumer/hide/{id}', [costumerController::class, 'hide'])->name('costumer.hide');
Route::get('/costumer/trash', [costumerController::class, 'trash'])->name('costumer.trash');
Route::get('/costumer/restore/{id}', [costumerController::class, 'restore'])->name('costumer.restore');
Route::get('/costumer/search/trash', [costumerController::class, 'search_trash'])->name('costumer.search_trash');

Route::get('/jasacuci', [JasaCuciController::class, 'index'])->name('jasacuci.index');
Route::get('/jasacuci/add', [JasaCuciController::class, 'create'])->name('jasacuci.create');
Route::post('/jasacuci/store', [JasaCuciController::class, 'store'])->name('jasacuci.store');
Route::get('/jasacuci/edit/{id}', [JasaCuciController::class, 'edit'])->name('jasacuci.edit');
Route::post('/jasacuci/update/{id}', [JasaCuciController::class, 'update'])->name('jasacuci.update');
Route::post('/jasacuci/delete/{id}', [JasaCuciController::class, 'delete'])->name('jasacuci.delete');

Route::get('/petugas', [petugasController::class, 'index'])->name('petugas.index');
Route::get('/petugas/add', [petugasController::class, 'create'])->name('petugas.create');
Route::post('/petugas/store', [petugasController::class, 'store'])->name('petugas.store');
Route::get('/petugas/edit/{id}', [petugasController::class, 'edit'])->name('petugas.edit');
Route::post('/petugas/update/{id}', [petugasController::class, 'update'])->name('petugas.update');
Route::post('/petugas/delete/{id}', [petugasController::class, 'delete'])->name('petugas.delete');

Route::get('/Home', [HomeController::class, 'index'])->name('Home.index');
Route::get('/Home/search', [HomeController::class, 'search'])->name('Home.search');

Route::get('/login', [LoginController::class, 'create'])->name('login.create');
Route::get('/login/store', [LoginController::class, 'store'])->name('login.store');
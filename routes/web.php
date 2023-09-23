<?php

use App\Http\Controllers\DoctorController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/zip', [DoctorController::class,'getAddressByCep']);
Route::post('/doctors/search', [DoctorController::class, 'search'])->name('doctors.search');
Route::get('/doctors/create', [DoctorController::class, 'create'])->name('doctors.create');
Route::put('/doctors/{id}', [DoctorController::class, 'update'])->name('doctors.update');
Route::get('/doctors/edit/{id}', [DoctorController::class, 'edit'])->name('doctors.edit');
Route::delete('/doctors/{id}', [DoctorController::class, 'destroy'])->name('doctors.destroy');
Route::get('/doctors/{id}', [DoctorController::class, 'show'])->name('doctors.show');
Route::post('/doctors', [DoctorController::class, 'store'])->name('doctors.store');
Route::get('/doctors', [DoctorController::class, 'index'])->name('doctors.index');

Route::get('/', function () {
    return view('layouts.app');
});


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

<?php

use App\Http\Controllers\CervejaController;
use App\Http\Controllers\CervejariaController;
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

Route::get('/', [CervejaController::class, 'index'])->name('cervejarias-index');
Route::get('/cervejaria/{id}/', [CervejariaController::class, 'index'])->name('cervejaria-detalhe');

Route::get('/teste/{id}', [CervejaController::class, 'getCategoria']);
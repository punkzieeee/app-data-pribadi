<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DataController;

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

Route::get('/', [DataController::class, 'index'])->name('data.index');
Route::get('show', [DataController::class, 'show'])->name('data.show');
Route::post('store', [DataController::class,'store'])->name('data.store');
Route::post('update', [DataController::class,'update'])->name('data.update');
Route::post('destroy', [DataController::class,'destroy'])->name('data.destroy');

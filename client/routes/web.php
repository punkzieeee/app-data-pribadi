<?php

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

Route::get('/', function () {
    $res = Http::get('http://127.0.0.1:8080/api/v1/all')['data'];
    return view('sections.index', compact('res'));
});
Route::get('/result', function () {
    return view('sections.result');
});

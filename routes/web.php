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
    // $res = Http::get('http://127.0.0.1:8000/api/all')['data'];

    // if ($res->failed()) {
    //     return response($res->json(), $res->status());
    // } else {
    //     return view('sections.index', compact('res'));
    // }
    return view('sections.index');
});
Route::get('/result', function () {
    return view('sections.result');
});

<?php

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

Route::get('/', function () {
    return view('welcome');
});


Route::post('/create', 'App\Http\Controllers\TaskController@store');
Route::get('/get', 'App\Http\Controllers\TaskController@index');
Route::post('/edit/{id}', 'App\Http\Controllers\TaskController@update');
Route::delete('/delete/{id}', 'App\Http\Controllers\TaskController@destroy');

Route::get('/dashboard/{any?}', function () {
    return view('dashboard');
})->where('any', '.*')->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

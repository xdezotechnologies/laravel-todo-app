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

//just for creating front-end pages
// Route::get('/createtask', function () {
//     return view('tasks.create');
// });

// Route::get('/managetask', function () {
//     return view('tasks.index');
// });

Route::resource('task','App\Http\Controllers\TaskController')->middleware('auth','CheckRole');

Auth::routes();

// Redirecting register to 404 not found page
Route::match(['get', 'post'], 'register', function(){
    return abort(404);
});

Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('user','App\Http\Controllers\UserController')->middleware('auth');

Route::resource('filemanager','App\Http\Controllers\FilemanagerController')->middleware('auth');

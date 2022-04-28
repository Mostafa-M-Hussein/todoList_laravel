<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth ;

use App\Http\Controllers ;

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

Auth::routes();


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/taskManager', [App\Http\Controllers\ProjectController::class, 'create']); 
Route::post('/taskManager', [App\Http\Controllers\ProjectController::class, 'store'])->name('add_task'); 

Route::get('/tasks', [App\Http\Controllers\ProjectController::class, 'index'])->name('tasks'); 

Route::get('/change_status/\{id}', [App\Http\Controllers\ProjectController::class, 'change'])->name('change'); 


Route::get('/tasks/{id}', [App\Http\Controllers\ProjectController::class, 'show' ]); 



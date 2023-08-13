<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StoriesController;
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
    return view('welcome');
});

Route::get('/stories', [StoriesController::class, 'index']);
Route::get('/stories/create', [StoriesController::class, 'create']);
Route::post('/stories',[StoriesController::class, 'store']);
Route::get('/stories/edit/{id}', [StoriesController::class, 'edit']);
Route::put('/stories/update/{id}', [StoriesController::class, 'update']);
Route::get('/stories/delete/{id}', [StoriesController::class, 'destroy']);


//Route::resource('pages', StoriesController::class);

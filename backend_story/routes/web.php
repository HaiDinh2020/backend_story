<?php

use App\Http\Controllers\AudiosController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\TextConfigsController;
use App\Http\Controllers\TextsController;
use App\Http\Controllers\TouchesController;
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


Route::get('/pages', [PagesController::class, 'index']);
Route::get('/pages/create', [PagesController::class, 'create']);
Route::post('/pages',[PagesController::class, 'store']);
Route::get('/pages/edit/{id}', [PagesController::class, 'edit']);
Route::put('/pages/update/{id}', [PagesController::class, 'update']);
Route::get('/pages/delete/{id}', [PagesController::class, 'destroy']);

Route::get('/texts', [TextsController::class, 'index']);
Route::get('/texts/create', [TextsController::class, 'create']);
Route::post('/texts',[TextsController::class, 'store']);
Route::get('/texts/edit/{id}', [TextsController::class, 'edit']);
Route::put('/texts/update/{id}', [TextsController::class, 'update']);
Route::get('/texts/delete/{id}', [TextsController::class, 'destroy']);

Route::get('/audios', [AudiosController::class, 'index']);
Route::get('/audios/create', [AudiosController::class, 'create']);
Route::post('/audios',[AudiosController::class, 'store']);
Route::get('/audios/edit/{id}', [AudiosController::class, 'edit']);
Route::put('/audios/update/{id}', [AudiosController::class, 'update']);
Route::get('/audios/delete/{id}', [AudiosController::class, 'destroy']);

Route::get('/textConfigs', [TextConfigsController::class, 'index']);
Route::get('/textConfigs/create', [TextConfigsController::class, 'create']);
Route::post('/textConfigs',[TextConfigsController::class, 'store']);
Route::get('/textConfigs/edit/{id}', [TextConfigsController::class, 'edit']);
Route::put('/textConfigs/update/{id}', [TextConfigsController::class, 'update']);
Route::get('/textConfigs/delete/{id}', [TextConfigsController::class, 'destroy']);

Route::get('/touches', [TouchesController::class, 'index']);
Route::get('/touches/create', [TouchesController::class, 'create']);
Route::post('/touches',[TouchesController::class, 'store']);
Route::get('/touches/edit/{id}', [TouchesController::class, 'edit']);
Route::put('/touches/update/{id}', [TouchesController::class, 'update']);
Route::get('/touches/delete/{id}', [TouchesController::class, 'destroy']);

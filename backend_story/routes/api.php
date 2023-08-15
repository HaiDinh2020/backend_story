<?php

use App\Http\Controllers\Api\AudiosController;
use App\Http\Controllers\Api\PagesController;
use App\Http\Controllers\Api\StoriesController;
use App\Http\Controllers\Api\TextConfigsController;
use App\Http\Controllers\Api\TextsController;
use App\Http\Controllers\Api\TouchesController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// crud api for Text
Route::get('texts', [TextsController::class, 'index']);
Route::post('texts', [TextsController::class, 'store']);
Route::put('texts/update/{id}', [TextsController::class, 'update']);
Route::delete('texts/delete/{id}', [TextsController::class, 'destroy']);

// crud api for Audio
Route::get('audios', [AudiosController::class, 'index']);
Route::post('audios', [AudiosController::class, 'store']);
Route::put('audios/update/{id}', [AudiosController::class, 'update']);
Route::delete('audios/delete/{id}', [AudiosController::class, 'destroy']);

// crud api for Story
Route::get('stories', [StoriesController::class, 'index']);
Route::post('stories', [StoriesController::class, 'store']);
Route::put('stories/update/{id}', [StoriesController::class, 'update']);
Route::delete('stories/delete/{id}', [StoriesController::class, 'destroy']);

// crud api for Page
Route::get('pages', [PagesController::class, 'index']);
Route::post('pages', [PagesController::class, 'store']);
Route::put('pages/update/{id}', [PagesController::class, 'update']);
Route::delete('pages/delete/{id}', [PagesController::class, 'destroy']);

// crud api for TextConfig
Route::get('textConfigs', [TextConfigsController::class, 'index']);
Route::post('textConfigs', [TextConfigsController::class, 'store']);
Route::put('textConfigs/update/{id}', [TextConfigsController::class, 'update']);
Route::delete('textConfigs/delete/{id}', [TextConfigsController::class, 'destroy']);

// crud api for Touch
Route::get('touches', [TouchesController::class, 'index']);
Route::post('touches', [TouchesController::class, 'store']);
Route::put('touches/update/{id}', [TouchesController::class, 'update']);
Route::delete('touches/delete/{id}', [TouchesController::class, 'destroy']);

Route::apiResource('demo', \App\Http\Controllers\Api\TextsController::class);
//Route::get('touches', [\App\Http\Controllers\TouchesController::class, 'index']);
//Route::post('touches', [\App\Http\Controllers\TouchesController::class, 'store']);

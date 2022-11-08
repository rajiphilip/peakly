<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\ForumController;
use App\Http\Controllers\API\DocumentController;
use App\Http\Controllers\API\PropertyController;
use App\Http\Controllers\API\ForumCategoryController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('auth/login', [AuthController::class, 'signin']);
Route::post('auth/register', [AuthController::class, 'signup']);
     
Route::middleware('auth:sanctum')->group( function () {
    Route::resource('documents', DocumentController::class);
    Route::resource('properties', PropertyController::class);
    Route::resource('forum-categories', ForumCategoryController::class);
    Route::resource('forums', ForumController::class);
    Route::resource('comments', CommentController::class);
});

<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\VotesController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\FeedbacksController;
use App\Http\Controllers\SubcommentsController;


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

// Public routes 
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::get('/users/{id}', [AuthController::class, 'user']);
Route::get('/votes', [VotesController::class, 'index']);



Route::get('/feedbacks/search/{title}', [FeedbacksController::class, 'search']);
Route::get('/feedbacks', [FeedbacksController::class, 'index'] );
Route::get('/feedbacks/{id}', [FeedbacksController::class, 'show'] );
Route::get('/comments', [CommentController::class, 'index']);
Route::get('/subcomments', [SubcommentsController::class, 'index']);


// Protected routes 
Route::group(['middleware'=>['auth:sanctum']], function () {
    Route::post('/feedbacks', [FeedbacksController::class, 'store']);
    Route::delete('/feedbacks/{id}', [FeedbacksController::class, 'destroy']);
    Route::put('/feedbacks/{id}', [FeedbacksController::class, 'update']);
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/comments', [CommentController::class, 'store']);
    Route::post('/subcomments', [SubcommentsController::class, 'store']);
    Route::post('/votes', [VotesController::class, 'store']);


    Route::get('/user', function(Request $request) {
        return $request->user();
    }); 
});


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

   
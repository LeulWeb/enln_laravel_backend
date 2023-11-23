<?php

use App\Http\Controllers\Api\AnnouncementApiController;
use App\Http\Controllers\Api\AnnualForumApiController;
use App\Http\Controllers\Api\UpcomingEventApiController;
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

Route::apiResource('announcements', AnnouncementApiController::class);
Route::apiResource('upcoming', UpcomingEventApiController::class);
Route::apiResource('forum', AnnualForumApiController::class);

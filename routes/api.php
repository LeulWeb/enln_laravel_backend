<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\EbookApiController;
use App\Http\Controllers\Api\StoryApiController;
use App\Http\Controllers\Api\SubscriberApiController;
use App\Http\Controllers\Api\AnnualForumApiController;
use App\Http\Controllers\Api\AnnouncementApiController;
use App\Http\Controllers\Api\UpcomingEventApiController;

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
Route::apiResource('story', StoryApiController::class);
Route::apiResource('resource', EbookApiController::class);
Route::apiResource('subscriber', SubscriberApiController::class);
// Route::get('ebook/{ebook}/download', [EbookController::class, 'downloadResource'])->name('ebook.download')->middleware('auth.dashboard');

//! work on this man
Route::get('resource/{ebook}/download', [EbookApiController::class, 'download']);

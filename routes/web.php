<?php

use App\Models\UpcomingEvent;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\EbookController;
use App\Http\Controllers\StoryController;
use App\Http\Controllers\SubscribeController;
use App\Http\Controllers\AnnualForumController;
use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\UpcomingEventController;

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
})->middleware('auth.dashboard');

// News route
Route::resource('new', StoryController::class)->middleware('auth.dashboard');

// Events route
// upcoming events
Route::resource('upcoming', UpcomingEventController::class)->middleware('auth.dashboard');
// annual Forum route

Route::resource('ebook', EbookController::class)->middleware('auth.dashboard');
// custom route to download the file
Route::get('ebook/{ebook}/download', [EbookController::class, 'downloadResource'])->name('ebook.download')->middleware('auth.dashboard');

//Route for announcement
Route::get('/announcements', [AnnouncementController::class, 'index'])->middleware('auth.dashboard');
Route::get('/announcements/create', [AnnouncementController::class, 'create'])->middleware('auth.dashboard');
Route::post('/announcements/store', [AnnouncementController::class, 'store'])->middleware('auth.dashboard');
Route::get('/announcements/{announcement}', [AnnouncementController::class, 'show'])->middleware('auth.dashboard');
Route::get('/announcements/{announcement}/edit', [AnnouncementController::class, 'edit'])->middleware('auth.dashboard');
Route::put('/announcements/{announcement}', [AnnouncementController::class, 'update'])->middleware('auth.dashboard');
Route::delete('/announcements/{announcement}', [AnnouncementController::class, 'destroy'])->name('announcements.destroy')->middleware('auth.dashboard');

Route::resource('forum', AnnualForumController::class)->middleware('auth.dashboard');


// email subscription
// search route
// Route::get('search-subscriber', [SubscribeController::class, 'search'])->middleware('auth.dashboard');
Route::resource('subscriber', SubscribeController::class)->middleware('auth.dashboard');
// toogle subscrubed
Route::put('toggle-status', [SubscribeController::class, 'toggleStatus'])->name('subscriber.toggle');


// Route for auth
Route::get('/register', [AuthController::class, 'register']);
Route::post('/register', [AuthController::class, 'store']);
Route::get('/login', [AuthController::class, 'login']);
Route::post('/login', [AuthController::class, 'authenticate']);
Route::get('/logout', [AuthController::class, 'logout']);


Route::get('/test-email', function () {
    return view('email.welcome');
});

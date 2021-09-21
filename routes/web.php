<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\TreeController;
use Spatie\Activitylog\Models\Activity;
use App\Http\Controllers\ActivityController;
use App\Http\Controllers\UserController;

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

Route::get('/announcement', [AnnouncementController::class, 'index'])->name('announcement.index');
Route::get('/announcement/create', [AnnouncementController::class, 'create'])->name('announcement.create');
Route::post('/announcement/create', [AnnouncementController::class, 'store'])->name('announcement.store');
Route::get('/announcement/{id}/edit', [AnnouncementController::class, 'edit'])->name('announcement.edit');
Route::put('/announcement/{id}/edit', [AnnouncementController::class, 'update'])->name('announcement.update');

Route::get('/tree', [TreeController::class, 'index'])->name('tree.index');
Route::get('/tree/create', [TreeController::class, 'create'])->name('tree.create');
Route::post('/tree/create', [TreeController::class, 'storeData'])->name('tree.store');
Route::post('/tree/storeimage', [TreeController::class, 'storeImage'])->name('tree.storeimage');
Route::get('/tree/{id}/edit', [TreeController::class, 'edit'])->name('tree.edit');
Route::put('/tree/{id}/edit', [TreeController::class, 'update'])->name('tree.update');
Route::get('/tree/{treeid}/edit/{id}', [TreeController::class, 'deleteImage'])->name('tree.deleteImage');
Route::get('/tree/{id}/delete', [TreeController::class, 'destroy'])->name('tree.delete');


// I have added the route(s) below just to make it easier to check the output to the browser.
Route::get('/users', [App\Http\Controllers\UserController::class, 'index'])->name('pages.user.index');

/* Route::get('/activity', function () {
    return view('welcome');
}); */

Route::get("activity",[ActivityController::class,'disp']);

Route::get('/users/create', function () {
    return view('pages.user.user_create');
});

Route::post('users/create/new',[UserController::class,'create_temp']);

Route::get('/mail-send', [UserController::class, 'mailSend']);

/* Route::get('/users/setup/{uuid}', function () {
    return view('pages.user.setup');
}); */

Route::get('/users/setup/{uuid}',[UserController::class,'setup']);

Route::post('/users/setup/add_user',[UserController::class,'create_user']);

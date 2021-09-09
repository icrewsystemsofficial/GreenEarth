<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AnnouncementController;

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
//Route::get('/announcement', [AnnouncementController::class, 'getAll'])->name('announcement.getAll');
Route::get('/announcement/create', [AnnouncementController::class, 'create'])->name('announcement.create');
Route::post('/announcement/create', [AnnouncementController::class, 'store'])->name('announcement.store');
Route::get('/announcement/edit', [AnnouncementController::class, 'edit'])->name('announcement.edit');
Route::put('/announcement/edit', [AnnouncementController::class, 'update'])->name('announcement.update');


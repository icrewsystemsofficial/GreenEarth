<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AnnouncementController;
use Spatie\Activitylog\Models\Activity;
use App\Http\Controllers\ActivityController;
use App\Http\Controllers\TreeMaintenanceController;

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
Route::get('/announcement/{id}/edit', [AnnouncementController::class, 'edit'])->name('announcement.edit');
Route::put('/announcement/{id}/edit', [AnnouncementController::class, 'update'])->name('announcement.update');


// I have added the route(s) below just to make it easier to check the output to the browser.
Route::get('/users', [App\Http\Controllers\UserController::class, 'index'])->name('pages.user.index');

// I have added a dummy route so I can easily view the tree maintenance form.
Route::get('/maint', [App\Http\Controllers\TreeMaintenanceController::class, 'create'])->name('pages.tree.add_maintenance');

/* Route::get('/activity', function () {
    return view('welcome');
}); */

Route::get("activity",[ActivityController::class,'disp']);


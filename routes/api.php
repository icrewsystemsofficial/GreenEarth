<?php

use App\Http\Controllers\API\BadgeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Portal\DirectoriesController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::as('api.v1.')->prefix('v1')->group(function () {
    Route::post('/admin/directories/upload-logo', [DirectoriesController::class, 'upload_logo'])->name('upload_business_logo');

    Route::prefix('analytics')->group(function () {
        Route::get('business/{business_id}',[BadgeController::class,'sendSessionDetails']);
    });
});

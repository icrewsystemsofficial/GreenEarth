<?php


use App\Http\Controllers\API\BadgeController;
use App\Http\Controllers\CalculationController;
use App\Http\Controllers\Portal\Admin\ForestsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Portal\DirectoriesController;
use App\Http\Controllers\Portal\Admin\TreesUpdatesController;

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

// BADGE ANALYTICS
    Route::prefix('analytics')->group(function () {
        Route::get('business/{business_id}', [BadgeController::class, 'sendSessionDetails']);
    });

    Route::post('/tree/upload-image', [TreesUpdatesController::class, 'upload_image'])->name('upload_tree_updates');
    Route::post('/calculate', [CalculationController::class, 'calculate'])->name('calulcate.offset');
    Route::get('/calculate/whois/{domain?}', [CalculationController::class, 'get_whois_information'])->name('calculate.lookup_whois');
    Route::get('/calculate/ping/{domain?}', [CalculationController::class, 'ping_domain'])->name('calculate.ping');
    Route::get('/api/v1/forests/get-tree-species/{id?}', [CalculationController::class, 'tree_data'])->name('tree.data');


    Route::get('/forests/geocode/{place?}', [ForestsController::class, 'geocode'])->name('forests.geocode');
});

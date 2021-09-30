<?php

/*
 ,----.                                    ,------.                 ,--.  ,--.
'  .-./   ,--.--. ,---.  ,---. ,--,--,     |  .---' ,--,--.,--.--.,-'  '-.|  ,---.
|  | .---.|  .--'| .-. :| .-. :|      \    |  `--, ' ,-.  ||  .--''-.  .-'|  .-.  |
'  '--'  ||  |   \   --.\   --.|  ||  |    |  `---.\ '-'  ||  |     |  |  |  | |  |
 `------' `--'    `----' `----'`--''--'    `------' `--`--'`--'     `--'  `--' `--'

AN INITIATIVE BY ICREWSYSTEMS SOFTWARE ENGINEERING LLP
Created with pride by Engineers across the globe who were a part of
icrewsystems junior developer program.

Before you start developing, make sure you understand the application
structure and standards.

@url https://greenearth.icrewsystems.com
@repo https://github.com/icrewsystmsofficial/GreenEarth W
*/

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Spatie\Activitylog\Models\Activity;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TreeController;
use App\Http\Controllers\ActivityController;
use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\TreeMaintenanceController;
use App\Http\Controllers\Portal\Admin\UserController;
use App\Http\Controllers\FAQController;


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
    return "This should redirect to the index method of the home route group -Leonard";
});

Auth::routes();

    /************************
        -- FRONTEND ROUTES --
    ************************/

    Route::prefix('home')->as('home.')->group(function () {
        Route::get('/', [HomeController::class, 'index'])->name('index');

        Route::get('/verify/{uuid}', [UserController::class, 'verify'])->name('users.verify');

        Route::prefix('faq')->as('faq.')->group(function () {
            Route::get('/', [FAQController::class, 'index_home'])->name('index');
            Route::get('/detail/{id}', [FAQController::class, 'show'])->name('show');
            Route::get('/{slug}', [FAQController::class, 'detail'])->name('detail');
        });
    });


    /************************
        -- PORTAL ROUTES --
    ************************/

    //Route group for the dashboard
Route::prefix('portal')->as('portal.')->group(function () {

    /* DASHBOARD PAGES */

    Route::get('/', [HomeController::class, 'index'])->name('index');

    //FAQs
    Route::prefix('faq')->as('faq.')->group(function () {
        Route::get('/', [FAQController::class, 'index_portal'])->name('index');
        Route::get('/create', [FAQController::class, 'create'])->name('create');
        Route::get('/update', [FAQController::class, 'update_disp'])->name('update');
        Route::get('/edit/{id}', [FAQController::class, 'edit'])->name('edit');
        Route::get('/delete', [FAQController::class, 'delete_disp'])->name('delete');
        Route::get('/delete/{id}', [FAQController::class, 'destroy'])->name('destroy');
        Route::post('/store', [FAQController::class, 'store'])->name('store');
        Route::post('/update', [FAQController::class, 'update'])->name('updateval');


    });

    /************************
        -- ADMIN ROUTES --
    ************************/

    Route::prefix('admin')->as('admin.')->group(function () {
        //Access these routes by route('portal.admin.ROUTENAME')

        /* USERS MODULE */
        Route::prefix('users')->as('users.')->group(function () {
            Route::get('/', [UserController::class, 'index'])->name('index');
            Route::get('/create', [UserController::class, 'create'])->name('create');
            Route::post('/store', [UserController::class, 'store'])->name('store');
            Route::post('/process-account/{id}', [UserController::class, 'process'])->name('process');
            Route::get('/manage/{id}', [UserController::class, 'show'])->name('manage');
            Route::post('/update/{id}', [UserController::class, 'update'])->name('update');
            Route::post('/delete/{id}', [UserController::class, 'destroy'])->name('delete');

            // Route::get('/create', function () {
            //     return view('pages.user.user_create');
            // });
            Route::post('/create/new',[UserController::class, 'create_temp']);
            Route::get('/setup/{uuid}',[UserController::class, 'setup']);
            Route::post('/setup/add_user',[UserController::class, 'create_user']);
        });

        /* TREES MODULE */
        Route::prefix('tree')->as('tree.')->group(function () {
            Route::get('/', [TreeController::class, 'index'])->name('index');
            Route::get('/create', [TreeController::class, 'create'])->name('create');
            Route::post('/create', [TreeController::class, 'storeData'])->name('store');
            Route::post('/storeimage', [TreeController::class, 'storeImage'])->name('storeimage');
            Route::get('/edit/{id}', [TreeController::class, 'edit'])->name('edit');
            Route::put('/edit/{id}', [TreeController::class, 'update'])->name('update');
            Route::get('/edit/{treeid}/{id}', [TreeController::class, 'deleteImage'])->name('deleteImage');
            Route::get('/delete/{id}', [TreeController::class, 'destroy'])->name('delete');
            Route::get('/add-maintenance/{id}', [TreeMaintenanceController::class, 'create'])->name('add_maintenance');
            Route::get('/history/{id}', [TreeMaintenanceController::class, 'index'])->name('history_maintenance');
            Route::post('/add-maintenance/{id}', [TreeMaintenanceController::class, 'store'])->name('maintenance_store');

        });


    });
});







//TODO Wrap this inside a route group. - Leonard
Route::get('/announcement', [AnnouncementController::class, 'index'])->name('announcement.index');
Route::get('/announcement/create', [AnnouncementController::class, 'create'])->name('announcement.create');
Route::post('/announcement/create', [AnnouncementController::class, 'store'])->name('announcement.store');
Route::get('/announcement/{id}/edit', [AnnouncementController::class, 'edit'])->name('announcement.edit');
Route::put('/announcement/{id}/edit', [AnnouncementController::class, 'update'])->name('announcement.update');



//Trees Module - Before cleaning. Kept for refernce if there is any need of edit.

/*     Route::get('/tree', [TreeController::class, 'index'])->name('tree.index');
    Route::get('/tree/create', [TreeController::class, 'create'])->name('tree.create');
    Route::post('/tree/create', [TreeController::class, 'storeData'])->name('tree.store');
    Route::post('/tree/storeimage', [TreeController::class, 'storeImage'])->name('tree.storeimage');
    Route::get('/tree/{id}/edit', [TreeController::class, 'edit'])->name('tree.edit');
    Route::put('/tree/{id}/edit', [TreeController::class, 'update'])->name('tree.update');
    Route::get('/tree/{treeid}/edit/{id}', [TreeController::class, 'deleteImage'])->name('tree.deleteImage');
    Route::get('/tree/{id}/delete', [TreeController::class, 'destroy'])->name('tree.delete'); */




// I have added a dummy route so I can easily view the tree maintenance form.
/* Route::get('/tree/{id}/add-maintenance', [TreeMaintenanceController::class, 'create'])->name('pages.tree.add_maintenance');
Route::get('/tree/{id}/history', [TreeMaintenanceController::class, 'index'])->name('pages.tree.history_maintenance');
Route::post('/tree/{id}/add-maintenance', [TreeMaintenanceController::class, 'store'])->name('maintenance.store');
 */

/* Route::get('/activity', function () {
    return view('welcome');
}); */

Route::get("activity",[ActivityController::class,'disp']);
Route::get('/mail-send', [UserController::class, 'mailSend']);


//FAQS - temp
/*
Route::get('/home/faq', [FAQController::class, 'index_home'])->name('indexhome');
Route::get('/portal/faq', [FAQController::class, 'index_portal'])->name('indexportal');
 */

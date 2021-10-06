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

use App\Models\Certificate;
use Illuminate\Mail\Markdown;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Spatie\Activitylog\Models\Activity;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TreeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ActivityController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\CertificateGenerator;
use App\Http\Controllers\TreeMaintenanceController;
use App\Http\Controllers\Portal\ChangelogController;
use App\Http\Controllers\Portal\Admin\UserController;
use App\Http\Controllers\Portal\DirectoriesController;
use App\Http\Controllers\FAQController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use App\Http\Controllers\Portal\Admin\AnnouncementController;
use App\Models\User;
use Laravel\Socialite\Facades\Socialite;

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
    return redirect(route('home.index'));
});

Auth::routes();


Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
    return redirect('/home');
})->middleware(['auth', 'signed'])->name('verification.verify');

/************************
    -- FRONTEND ROUTES --
************************/

Route::prefix('home')->as('home.')->group(function () {
    Route::get('/', [FrontendController::class, 'index'])->name('index');
    Route::get('/calculate', [FrontendController::class, 'calculate'])->name('calculate');
    Route::get('/certificate/{uuid}', [FrontendController::class, 'index']);

    Route::get('/directory', [DirectoriesController::class, 'home_index'])->name('directory.index');
    Route::get('/directory/{brand_name_slug}', [DirectoriesController::class, 'home_show'])->name('directory.show');

    Route::get('/track-my-tree/{uuid}', [FrontendController::class, 'index']);
    Route::get('/statistics', [FrontendController::class, 'index']);

    Route::get('/about', [FrontendController::class, 'index']);
    Route::get('/contributors', [FrontendController::class, 'index']);
    Route::get('/investors', [FrontendController::class, 'index']);
    Route::get('/partners', [FrontendController::class, 'index']);
    Route::get('/announcements', [FrontendController::class, 'index']);
    Route::get('/blog', [FrontendController::class, 'index']);
    Route::get('/legal/privacy-policy', [FrontendController::class, 'privacy_policy'])->name('privacy-policy');
    Route::get('/legal/terms-of-service', [FrontendController::class, 'terms_of_service'])->name('terms-of-service');
    Route::get('/coming-soon', [FrontendController::class, 'comingsoon'])->name('coming-soon');
    Route::get('/verify/{uuid}', [UserController::class, 'verify'])->name('users.verify');
    Route::get('/contact', [FrontendController::class, 'comingsoon'])->name('contact');

    //FAQ -- Non-portal
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
Route::prefix('portal')->middleware(['auth'])->as('portal.')->group(function () {
    /* DASHBOARD PAGES */
    Route::get('/', [HomeController::class, 'index'])->name('index');
    Route::prefix('my-business')->as('owner.')->group(function () {
        Route::get('/', [DirectoriesController::class, 'owner_index'])->name('index');
        Route::get('/edit/{id}', [DirectoriesController::class, 'owner_edit'])->name('edit');
        Route::put('/update/{id}', [DirectoriesController::class, 'owner_update'])->name('update');
    });

    Route::get('/my-profile', [ProfileController::class, 'index'])->name('myprofile');
    Route::post('/my-profile/save/{id}', [ProfileController::class, 'save'])->name('myprofile.save');
    Route::post('/my-profile/verify-email', [ProfileController::class, 'resend_email_verification'])->middleware(['throttle:6,1'])->name('myprofile.verify');
    // Route::resource('users', ProfileController::class); //TODO deprecate this, it was mistakenly added by Aren.

    Route::get('/changelog', [ChangelogController::class, 'show_changelog'])->name('changelog');

     /* ANNOUNCEMENT MODULE - View Announcements */
     Route::prefix('announcements')->as('announcements.')->group(function () {
        Route::get('/', [AnnouncementController::class, 'index'])->name('index');
        Route::get('/view/{id}', [AnnouncementController::class, 'view'])->name('view');
    });

    //FAQ-Portal -- Portal -- Non Admins
    Route::prefix('faq')->as('faq.')->group(function () {
        Route::get('/', [FAQController::class, 'index_portal'])->name('index');
        Route::get('/detail/{id}', [FAQController::class, 'show'])->name('show');
        Route::get('/{slug}', [FAQController::class, 'detail'])->name('detail');
    });


    /************************
        -- ADMIN ROUTES --
     ************************/

    Route::prefix('admin')->as('admin.')->group(function () {
        //Access these routes by route('portal.admin.ROUTENAME')

        /* DIRECTORY MODULE */
        Route::prefix('directory')->as('directory.')->group(function () {
            Route::get('/', [DirectoriesController::class, 'index'])->name('index');
            Route::get('/create', [DirectoriesController::class, 'create'])->name('create');
            Route::post('/store', [DirectoriesController::class, 'store'])->name('store');
            Route::get('/manage/{id}', [DirectoriesController::class, 'edit'])->name('edit');
            Route::put('/update/{id}', [DirectoriesController::class, 'update'])->name('update');
            Route::post('/delete/{id}', [DirectoriesController::class, 'destroy'])->name('delete');
        });

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
            Route::post('/create/new', [UserController::class, 'create_temp']);
            Route::get('/setup/{uuid}', [UserController::class, 'setup']);
            Route::post('/setup/add_user', [UserController::class, 'create_user']);
            // CERTIFICATE MODULE
            Route::prefix('certificate')->as('certificate.')->group(function () {
                Route::get('/generate/{id}', [CertificateGenerator::class, 'generatePDF'])->name('certificate.generate');
                //commented until Rishi finishes task 2726
                // Route::get('/{business_uuid}/generate',[CertificateGenerator::class,'generatePDF'])->name('certificate.download');
                Route::get('/{business_uuid}/view', [CertificateGenerator::class, 'viewPDF'])->name('certificate.view');
            });
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

        /* ANNOUNCEMENT MODULE */
        Route::prefix('announcements')->as('announcements.')->group(function () {
            Route::get('/', [AnnouncementController::class, 'index'])->name('index');
            Route::get('/create', [AnnouncementController::class, 'create'])->name('create');
            Route::post('/create', [AnnouncementController::class, 'store'])->name('store');
            Route::get('/edit/{id}', [AnnouncementController::class, 'edit'])->name('edit');
            Route::put('/edit/{id}', [AnnouncementController::class, 'update'])->name('update');
        });

        // FAQ -- Portal -- Admins
        Route::prefix('faq')->as('faq.')->group(function () {
            Route::get('/', [FAQController::class, 'index_portal_admin'])->name('index');
            Route::get('/create', [FAQController::class, 'create'])->name('create');
            Route::get('/update', [FAQController::class, 'update_disp'])->name('update');
            Route::get('/edit/{id}', [FAQController::class, 'edit'])->name('edit');
            Route::get('/delete', [FAQController::class, 'delete_disp'])->name('delete');
            Route::get('/delete/{id}', [FAQController::class, 'destroy'])->name('destroy');
            Route::post('/store', [FAQController::class, 'store'])->name('store');
            Route::post('/update', [FAQController::class, 'update'])->name('updateval');
        });

    });

});



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






Route::get("activity", [ActivityController::class, 'disp']);



Route::get('/mail-send', [UserController::class, 'mailSend']);
Route::get('/test-blade', function () {
    $markdown = new Markdown(view(), config('mail.markdown'));
   return ($html = $markdown->render('certificate.certificate'));
});


//SOCIALITE
Route::get('/auth/redirect', function () {
    return Socialite::driver('google')->redirect();
})->name('login.google');

Route::get('/login/google/callback', [LoginController::class, 'registerOrLoginUser'])->name('login.redirect');

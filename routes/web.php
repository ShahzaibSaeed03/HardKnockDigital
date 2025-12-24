<?php

use Illuminate\Support\Facades\Route;

// Auth
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ForgotPasswordController;

// Admin
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UserProfileController;
use App\Http\Controllers\Admin\SettingsController;
use App\Http\Controllers\Admin\ChangePasswordController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\NewsController as AdminNewsController;
use App\Http\Controllers\Admin\AnnouncementController as AdminAnnouncementController;
use App\Http\Controllers\Admin\StatController as AdminStatController;

use App\Http\Controllers\Admin\ShowController as AdminShowController;


// Frontend
use App\Http\Controllers\Frontend\SiteController;
use App\Http\Controllers\Frontend\NewsController as FrontNewsController;
use App\Http\Controllers\Frontend\AnnouncementController as FrontAnnouncementController;
use App\Http\Controllers\NewsletterController;

use App\Http\Controllers\Frontend\ShowController as FrontShowController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// --------------------- Guest (auth) ---------------------
Route::middleware('guest')->group(function () {
    Route::get('register', [RegisterController::class, 'index'])->name('register');
    Route::post('register', [RegisterController::class, 'store']);

    Route::get('login', [LoginController::class, 'index'])->name('login');
    Route::post('login', [LoginController::class, 'login']);

    Route::get('forgot-password', [ForgotPasswordController::class, 'index'])->name('forgot-password');
    Route::post('forgot-password', [ForgotPasswordController::class, 'reset']);
});

// --------------------- Admin (auth required) ---------------------
Route::middleware('auth')->group(function () {
    // Dashboard
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Logout
    Route::post('logout', [LogoutController::class, 'index'])->name('logout');

    // Profile
    Route::get('profile', [UserProfileController::class, 'index'])->name('profile');
    Route::post('profile', [UserProfileController::class, 'update']);

    // Settings
    Route::get('settings/theme', [SettingsController::class, 'index'])->name('settings.theme');
    Route::post('settings/theme', [SettingsController::class, 'updateTheme']);
    Route::get('settings/company', [SettingsController::class, 'company'])->name('settings.company');
    Route::post('settings/company', [SettingsController::class, 'updateCompany']);
    Route::get('settings/invoice', [SettingsController::class, 'invoice'])->name('settings.invoice');
    Route::post('settings/invoice', [SettingsController::class, 'updateInvoice']);
    Route::get('settings/attendance', [SettingsController::class, 'attendance'])->name('settings.attendance');
    Route::post('settings/attendance', [SettingsController::class, 'updateAttendance']);
    Route::get('change-password', [ChangePasswordController::class, 'index'])->name('change-password');
    Route::post('change-password', [ChangePasswordController::class, 'update']);

    // Users (admin)
    Route::get('users', [UserController::class, 'index'])->name('users');
    Route::post('users', [UserController::class, 'store']);
    Route::put('users', [UserController::class, 'update']);
    Route::delete('users', [UserController::class, 'destroy']);

    // ------- Admin CRUD under /admin/* to avoid conflicts with frontend -------
    Route::prefix('admin')->name('admin.')->group(function () {
        // News CRUD (admin)
        Route::resource('news', AdminNewsController::class);
        // TinyMCE image upload
        Route::post('editor/upload', [AdminNewsController::class, 'editorUpload'])->name('editor.upload');

        // Announcements CRUD (admin)
        Route::resource('announcements', AdminAnnouncementController::class);

        // Stats CRUD (admin)
        Route::resource('stats', AdminStatController::class);

        Route::resource('shows', AdminShowController::class);

    });
});

// Admin landing
Route::get('/admin', fn() => redirect()->route('dashboard'));

// --------------------- Frontend (public) ---------------------
Route::get('/', [SiteController::class, 'home'])->name('home');
Route::get('/about', [SiteController::class, 'about'])->name('about');
Route::get('/work-with-us', [SiteController::class, 'workWithUs'])->name('work.with.us');

// Frontend News
Route::get('/news', [FrontNewsController::class, 'index'])->name('news.list');
Route::get('/news/{slug}', [FrontNewsController::class, 'show'])->name('news.show');

// Frontend Announcements
Route::get('/announcements', [FrontAnnouncementController::class, 'index'])->name('announcements.list');
Route::get('/announcements/{slug}', [FrontAnnouncementController::class, 'show'])->name('announcements.show');

Route::post('/newsletter/subscribe', [NewsletterController::class, 'subscribe'])
    ->name('newsletter.subscribe');


// Frontend Shows
Route::get('/shows', [FrontShowController::class, 'index'])->name('shows.list');
Route::get('/shows/{slug}', [FrontShowController::class, 'show'])->name('shows.show'); // <-- add/ensure




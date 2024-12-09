<?php

use App\Http\Controllers\Backend\Auth\LoginController;
use App\Http\Controllers\Backend\Auth\ProfileController;
use App\Http\Controllers\Backend\BackupController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\CounterController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\Export\UserExportController;
use App\Http\Controllers\Backend\FaqController;
use App\Http\Controllers\Backend\FeatureController;
use App\Http\Controllers\Backend\GalleryController;
use App\Http\Controllers\Backend\ModuleController;
use App\Http\Controllers\backend\PermissionController;
use App\Http\Controllers\backend\RoleController;
use App\Http\Controllers\Backend\Setting\EmailConfigurationController;
use App\Http\Controllers\Backend\Setting\GeneralSettingController;
use App\Http\Controllers\Backend\SliderController;
use App\Http\Controllers\Backend\SpecialController;
use App\Http\Controllers\Backend\TestimonialController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\VolunteerController;
use Illuminate\Support\Facades\Route;

Route::redirect('/admin', '/admin/login');
Route::prefix('/admin')->as('admin.')->group(function () {
    // login route
    Route::middleware(['auth.redirect'])->group(function () {
        Route::get('login', [LoginController::class, 'loginPage'])->name('login_page');
        Route::post('login', [LoginController::class, 'login'])->name('login');
    });

    Route::middleware(['auth.check', 'verified'])->group(function () {
        // profile route
        Route::get('profile', [ProfileController::class, 'ProfilePage'])->name('profile_page');
        Route::post('edit-profile', [ProfileController::class, 'editProfile'])->name('edit_profile');

        // change password route
        Route::get('change-password', [ProfileController::class, 'ChangePasswordPage'])->name('change_password_page');
        Route::post('change-password', [ProfileController::class, 'ChangePassword'])->name('change_password');

        // dashboard route
        Route::get('dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');

        // logout route
        Route::post('logout', [LoginController::class, 'logout'])->name('logout');

        // resource controller
        Route::resource('module', ModuleController::class);
        Route::resource('permission', PermissionController::class);
        Route::resource('role', RoleController::class);
        Route::resource('user', UserController::class);
        Route::resource('backup', BackupController::class);
        Route::resource('category', CategoryController::class);
        Route::resource('slider', SliderController::class);
        Route::resource('feature', FeatureController::class);
        Route::resource('testimonial', TestimonialController::class);
        Route::resource('faqs', FaqController::class);
        Route::resource('volunteer', VolunteerController::class);
        Route::resource('gallery', GalleryController::class);

        // backup download route
        Route::get('/backup/download/{file_name}', [BackUpcontroller::class, 'download'])->name('backupDownload');

        // special route
        Route::get('special', [SpecialController::class, 'edit'])->name('editSpecial');
        Route::post('special', [SpecialController::class, 'update'])->name('updateSpecial');

        //counter
        Route::get('counter', [CounterController::class, 'edit'])->name('editCounter');
        Route::post('counter', [CounterController::class, 'update'])->name('updateCounter');

        // export route
        Route::get('user_export/pdf', [UserExportController::class, 'exportPDF'])->name('exportPDF');
        Route::get('user_export/excel', [UserExportController::class, 'exportExcel'])->name('exportExcel');

        // general setting route
        Route::get('general-setting', [GeneralSettingController::class, 'index'])->name('general_setting_page');
        Route::post('general-setting', [GeneralSettingController::class, 'setting_submit'])->name('general_setting_submit');

        // email configuration setting route
        Route::get('email-configuration', [EmailConfigurationController::class, 'index'])->name('email_configuration_page');
        Route::post('email-configuration', [EmailConfigurationController::class, 'setting_submit'])->name('email_configuration_submit');
    });
});

<?php

use App\Http\Controllers\Frontend\HomeController;
use Illuminate\Support\Facades\Route;

Route::prefix('/')->group(function () {
    Route::get('', [HomeController::class, 'homePage'])->name('homePage');
    Route::get('about', [HomeController::class, 'aboutPage'])->name('aboutPage');
    Route::get('faq', [HomeController::class, 'faqPage'])->name('faqPage');
});

require 'auth.php';
require 'admin.php';

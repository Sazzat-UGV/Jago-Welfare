<?php

use App\Http\Controllers\Frontend\HomeController;
use Illuminate\Support\Facades\Route;

Route::prefix('/')->group(function () {
    Route::get('', [HomeController::class, 'homePage'])->name('homePage');
    Route::get('about', [HomeController::class, 'aboutPage'])->name('aboutPage');
    Route::get('faq', [HomeController::class, 'faqPage'])->name('faqPage');
    Route::get('volunteer', [HomeController::class, 'volunteerPage'])->name('volunteerPage');
    Route::get('gallery', [HomeController::class, 'galleryPage'])->name('galleryPage');
    Route::get('blog', [HomeController::class, 'blogPage'])->name('blogPage');
    Route::get('blog-details/{id}', [HomeController::class, 'singleBlogPage'])->name('singleBlogPage');
    Route::post('comment', [HomeController::class, 'submitComment'])->name('submitComment');
    Route::post('reply', [HomeController::class, 'submitReply'])->name('submitReply');
});

require 'auth.php';
require 'admin.php';

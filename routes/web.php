<?php

use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\PaymentController;
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
    Route::get('event', [HomeController::class, 'eventPage'])->name('eventPage');
    Route::get('event-details/{slug}', [HomeController::class, 'singleEventPage'])->name('singleEventPage');

    // event_ticket_payment
    Route::post('event/ticket/payment', [PaymentController::class, 'eventPayment'])->name('eventPayment');
    Route::get('event/ticket/paypal-success', [PaymentController::class, 'eventPaypalSuccess'])->name('eventPaypalSuccess');
    Route::get('event/ticket/cancel', [PaymentController::class, 'eventPaymentCancel'])->name('eventPaymentCancel');
    Route::get('event/ticket/stripe-success', [PaymentController::class, 'eventStripeSuccess'])->name('eventStripeSuccess');

});

require 'auth.php';
require 'admin.php';

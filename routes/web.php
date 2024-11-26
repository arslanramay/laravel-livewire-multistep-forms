<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SubscriberController;

// Route for the Landing Page
Route::get('/', function () {
    return view('welcome');
    // return view('subscribers-list');

});


// Routes for User Onboarding form
Route::get('/subscriber-onboarding-form', function() {
    return view('subscriberform');
})->name('subscribers.new');

Route::get('/subscribers-list', [SubscriberController::class, 'index'])->name('subscribers.list');
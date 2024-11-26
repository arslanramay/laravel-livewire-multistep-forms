<?php

use App\Livewire\SubscriberForm;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SubscriberController;

Route::get('/', function () {
    return view('welcome');
});


// Routes for User Onboarding form
Route::get('/subscriber-onboarding-form', function() {
    return view('subscriberform');
});

Route::get('/subscribers-list', [SubscriberController::class, 'index'])->name('subscribers.list');
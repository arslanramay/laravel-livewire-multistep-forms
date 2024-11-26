<?php

use App\Livewire\SubscriberForm;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


// Routes for User Onboarding form
Route::get('/subscriber-onboarding-form', function() {
    return view('subscriberform');
});

<?php

use App\Livewire\SubscriberForm;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/subscriber-onboarding-form', function() {
    return view('subscriberform');
});

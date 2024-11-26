<?php

use App\Livewire\Counter;
use App\Livewire\CreatePost;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/counter', Counter::class);
Route::get('/post/new', CreatePost::class);

Route::get('/contactform', function(){
    // return view('livewire.contactform');
    return view('contactform');
});

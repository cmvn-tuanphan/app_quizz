<?php

use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('welcome');
})->name("index");

Route::get("/access-denied", function(){
    return view("auth.403");
})->name("auth.403");

require __DIR__.'/login.php';

require __DIR__.'/user.php';

require __DIR__.'/admin.php';

<?php

use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'checkrole:1'])->group(function () {
    Route::get('/admin', function(){
        return "This is admin page";
    });
});

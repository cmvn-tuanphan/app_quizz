<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController as login;

Route::get("/dang-nhap" , [login::class , "login"])->name("login");
Route::post("/dang-nhap" , [login::class , "postLogin"])->name("postLogin");
Route::get("/dang-ky" , [login::class , "register"])->name("register");
Route::post("/dang-ky" , [login::class , "postRegister"])->name("postRegister");
Route::middleware(['auth', 'checkrole:1'])->group(function () {
    Route::get('/admin', function(){
        return "This is admin page";
    });
});

<?php

use App\Http\Controllers\Backend\AlbumController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\PhotoController;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('welcome');
});

Route::group(["prefix"=>"admin" ,"as" =>"admin."],function(){
    Route::get('/home',[DashboardController::class,"home"])->name("home");
    //=============================================
    //Album Routes
     //=============================================
    Route::get("/albums",[AlbumController::class,"index"])->name("albums.index");
    Route::get("/album/create",[AlbumController::class,"create"])->name("album.create");
    Route::post("/album/store",[AlbumController::class,"store"])->name("album.store");
    Route::get("/album/{id}",[AlbumController::class,"show"])->name("album.show");
    Route::get("/album/destroy/{id}",[AlbumController::class,"destroy"])->name("album.destroy");

    //Photos Routes
    Route::get("/photo/create",[PhotoController::class,"create"])->name("photo.create");
    Route::post("/photo",[PhotoController::class,"store"])->name("photo.store");
    Route::delete("/photo/delete/{id}",[PhotoController::class,"destroy"])->name("photo.delete");
});

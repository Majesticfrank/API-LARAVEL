<?php

use App\Http\Controllers\postcontroller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/get-all-post', [postcontroller::class, 'index' ]);
Route::get('/get-post/{id}', [PostController::class,'show']);
Route::post('/create-post',[postcontroller::class,'store']);
Route::put('/edit-post/{id}',[postcontroller::class, 'Editpost']);
Route::delete('/destroy-post/{id}',[postcontroller::class, 'destroy']);

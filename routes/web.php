<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
Route::get('contacts', [ContactController::class, 'index'])->name('contacts.index');
Route::get('addcontact',[ContactController::class,'showform']);
Route::post('addcontact',[ContactController::class,'insertdata']);
Route::get('edit/{id}',[ContactController::class,'edit']);
Route::get('delete/{id}',[ContactController::class,'delete']);
Route::put('update/{id}',[ContactController::class,'update']);
Route::get('/', function () {
    return view('welcome');
});

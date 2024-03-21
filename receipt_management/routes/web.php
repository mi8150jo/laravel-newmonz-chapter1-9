<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\ReceiptsController;
use \App\Http\Controllers\MachinesController;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/receipt_management', function(){
    return view('top');
})->name('top');

Route::get('/receipt_management/receipt_create', [ReceiptsController::class, 'create'])->name('receipt.create');
Route::post('/receipt_management', [ReceiptsController::class, 'store'])->name('receipt.store');
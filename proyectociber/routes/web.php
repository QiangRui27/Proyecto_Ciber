<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VulnerabilidadController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('vulnerabilidades', VulnerabilidadController::class);
<?php

use App\Http\Controllers\FrontendController;
use Illuminate\Support\Facades\Route;



Route::get('/', [FrontendController::class, 'index']);
Route::get('/about', [FrontendController::class, 'about']);
Route::get('/service', [FrontendController::class, 'service']);
<?php

use App\Http\Controllers\FrontendController;
use Illuminate\Support\Facades\Route;



Route::get('/', [FrontendController::class, 'index']);
Route::get('/about', [FrontendController::class, 'about']);
Route::get('/service', [FrontendController::class, 'service']);
Route::get('/protfolio', [FrontendController::class, 'protfolio']);
Route::get('/team', [FrontendController::class, 'team']);
Route::get('/blog', [FrontendController::class, 'blog']);
Route::get('/pricing', [FrontendController::class, 'pricing']);
Route::get('/contact', [FrontendController::class, 'contact']);
<?php

use App\Http\Controllers\FrontendController;
use Illuminate\Support\Facades\Route;



Route::get('/', [FrontendController::class, 'index']);
Route::get('/about', [FrontendController::class, 'about']);
Route::get('/service', [FrontendController::class, 'service']);
Route::get('/service-details', [FrontendController::class, 'serviceDetails']);
Route::get('/protfolio', [FrontendController::class, 'protfolio']);
Route::get('/protfolio-details', [FrontendController::class, 'protfolioDetails']);
Route::get('/team', [FrontendController::class, 'team']);
Route::get('/blog', [FrontendController::class, 'blog']);
Route::get('/blog-details', [FrontendController::class, 'blogDetails']);
Route::get('/pricing', [FrontendController::class, 'pricing']);
Route::get('/contact', [FrontendController::class, 'contact']);
Route::get('/order', [FrontendController::class, 'order']);
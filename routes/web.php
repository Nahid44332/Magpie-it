<?php

use App\Http\Controllers\backend\admincontroller;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\backend\AboutController;
use App\Http\Controllers\backend\bannercontroller;
use App\Http\Controllers\backend\PricingController;
use App\Http\Controllers\backend\ServiceController;
use App\Http\Controllers\backend\TeamController;
use App\Http\Controllers\FrontendController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;



Route::get('/', [FrontendController::class, 'index']);
Route::get('/about', [FrontendController::class, 'about']);
Route::get('/service', [FrontendController::class, 'service']);
Route::get('/service-details/{id}', [FrontendController::class, 'serviceDetails']);
Route::get('/protfolio', [FrontendController::class, 'protfolio']);
Route::get('/protfolio-details', [FrontendController::class, 'protfolioDetails']);
Route::get('/team', [FrontendController::class, 'team']);
Route::get('/blog', [FrontendController::class, 'blog']);
Route::get('/blog-details', [FrontendController::class, 'blogDetails']);
Route::get('/pricing', [FrontendController::class, 'pricing']);
Route::get('/contact', [FrontendController::class, 'contact']);
Route::get('/order', [FrontendController::class, 'order']);

//admin Login
Route::get('/admin/login', [AdminAuthController::class, 'AdminLogin']);
Route::get('/admin/logout', [AdminAuthController::class, 'AdminLogout']);
Auth::routes();

Route::get('/admin/dashboard', [admincontroller::class, 'adminDashboard']);

//Banner Route Start....
Route::get('/admin/banner', [bannercontroller::class, 'banner']);
Route::post('/admin/banner/store', [bannercontroller::class, 'store']);
Route::get('/banner/{id}/edit', [bannercontroller::class, 'edit'])->name('banner.edit');
Route::put('/admin/banner/update/{id}', [bannercontroller::class, 'update'])->name('banner.update');
Route::delete('/admin/banner/delete/{id}', [bannerController::class, 'destroy'])->name('banner.destroy');
//Banner Route End...

//About Route Start...
Route::get('/admin/about', [AboutController::class, 'about']);
Route::post('/admin/about/update', [AboutController::class, 'update']);
Route::post('/admin/whyus/store', [AboutController::class, 'store'])->name('whyuse.store');
Route::post('/admin/whyus/update/{id}', [AboutController::class, 'whysUpdate']);
Route::delete('/admin/whyus/delete/{id}', [AboutController::class, 'delete']);
//about Route End...

//team Route Start...
Route::get('/admin/team', [TeamController::class, 'team']);
Route::post('/admin/team-intro/update', [TeamController::class, 'teamIntroUpdate']);
Route::post('/admin/team-leader/store', [TeamController::class, 'teamLeaderStore']);
Route::post('/admin/team-leader/update/{id}', [TeamController::class, 'teamLeaderUpdate']);
Route::get('/admin/team-leader/delete/{id}', [TeamController::class, 'teamLeaderDelete']);
Route::post('/admin/team-member/store', [TeamController::class, 'teamMemberStore']);
Route::post('/admin/team-member/update/{id}', [TeamController::class, 'teamMemberUpdate']);
//Tema Route End...

//Service Route Start...
Route::get('/admin/service', [ServiceController::class, 'Service']);
Route::post('/admin/service/store',[ServiceController::class,'store']);
Route::post('/admin/service/update', [ServiceController::class, 'update']);
Route::post('/admin/service-details/update', [ServiceController::class, 'detailsUpdate'])->name('service.update');
Route::get('/admin/service-details/delete/{id}', [ServiceController::class,'detailsDestroy']);
//Service Route End....

//Pricing Route Start...
Route::get('/admin/pricing', [PricingController::class, 'price']);
Route::post('/admin/pricing/store', [PricingController::class, 'priceStore']);
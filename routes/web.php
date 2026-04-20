<?php

use App\Http\Controllers\backend\admincontroller;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\backend\AboutController;
use App\Http\Controllers\backend\bannercontroller;
use App\Http\Controllers\backend\CelenderController;
use App\Http\Controllers\backend\FileControlller;
use App\Http\Controllers\backend\MessageController;
use App\Http\Controllers\backend\OrderController;
use App\Http\Controllers\backend\PricingController;
use App\Http\Controllers\backend\ProtfolioController;
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
Route::get('/protfolio-details/{id}', [FrontendController::class, 'protfolioDetails']);
Route::get('/team', [FrontendController::class, 'team']);
Route::get('/blog', [FrontendController::class, 'blog']);
Route::get('/blog-details', [FrontendController::class, 'blogDetails']);
Route::get('/pricing', [FrontendController::class, 'pricing']);
Route::get('/contact', [FrontendController::class, 'contact']);
Route::post('/contact/store', [FrontendController::class, 'contactStore'])->name('contact.store');
Route::get('/order', [FrontendController::class, 'order']);
Route::post('/order/store', [FrontendController::class, 'orderStore']);

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
Route::post('/admin/pricing/update/{id}', [PricingController::class,'update']);
Route::get('/admin/pricing/delete/{id}', [PricingController::class,'delete']);
//Pricing Route End...

//Order Route Start...
Route::get('/admin/order/{status}', [OrderController::class, 'Order']);
Route::post('/order/status/{id}', [OrderController::class,'statusUpdate'])->name('order.status');
Route::post('/admin/order/update/{id}',[OrderController::class,'update'])->name('order.update');
Route::delete('/admin/order/delete/{id}',[OrderController::class,'delete'])->name('order.delete');
//order Route End...

// Protfolio Route Start...
Route::get('/admin/portfolio', [ProtfolioController::class, 'portfolio'])->name('portfolio.index');
Route::post('/admin/portfolio/store', [ProtfolioController::class, 'store'])->name('portfolio.store');
Route::put('/admin/portfolio/update/{id}', [ProtfolioController::class, 'update'])->name('portfolio.update');
Route::delete('/admin/portfolio/delete/{id}', [ProtfolioController::class, 'destroy'])->name('portfolio.delete');
Route::post('/admin/portfolio/update-details/{id}', [ProtfolioController::class, 'updateDetails'])->name('portfolio.update.details');
// Protfolio Route End...

//Celender Route Start...
Route::get('/admin/celender', [CelenderController::class, 'celender']);
Route::post('/admin/celender/event/store', [CelenderController::class, 'eventStore'])->name('event.store');
Route::delete('/events/delete/{id}', [CelenderController::class, 'destroy'])->name('event.delete');
//Celender Route End...

//Message Route Start...
Route::get('/admin/message', [MessageController::class, 'message']);
Route::get('/admin/messages/status/{id}', [MessageController::class, 'toggleStatus'])->name('messages.status');
Route::get('/admin/messages/delete/{id}', [MessageController::class, 'destroy'])->name('messages.delete');

//message route end..

//file route start...
Route::get('/admin/file', [FileControlller::class, 'file']);
Route::post('admin/files/upload', [FileControlller::class, 'store'])->name('files.store');
Route::delete('admin/files/delete/{id}', [FileControlller::class, 'destroy'])->name('files.destroy');
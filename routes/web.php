<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderController;

 Route::view('/', 'pages.home')->name('home');
 Route::view('/drop-point', 'pages.drop-point')->name('drop-point');
 Route::view('/trace-track', 'pages.trace-track')->name('trace-track');
 Route::view('/shipping-rates', 'pages.shipping-rates')->name('shipping-rates');
 Route::view('/faq', 'pages.faq')->name('faq');
 Route::view('/packaging-info', 'pages.packaging-info')->name('packaging-info');
 Route::view('/terms', 'pages.terms')->name('terms');
 Route::view('/layanan', 'pages.layanan')->name('layanan');
 Route::view('/company-profile', 'pages.company-profile')->name('company-profile');
 Route::view('/contact-us', 'pages.contact-us')->name('contact-us');
 Route::get('/order', [OrderController::class, 'showForm'])->name('order.form');
 Route::post('/order', [OrderController::class, 'submit'])->name('order.submit');
//use App\Filament\Kurir\Pages\UploadBukti;

Route::view('/', 'pages.home')->name('home');

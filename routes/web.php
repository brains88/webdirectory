<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WebsiteController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AdminController;

Route::get('/', [WebsiteController::class, 'index']);
Route::post('/search', [WebsiteController::class, 'search'])->name('search');

Route::middleware(['auth'])->group(function () {
    Route::get('/home', [WebsiteController::class, 'addWebsite'])->name('websites.create');
    Route::post('/websites', [WebsiteController::class, 'store'])->name('websites.store');
    Route::post('/websites/{website}/vote', [WebsiteController::class, 'vote'])->name('websites.vote');
});


Route::middleware(['auth', 'admin'])->group(function () {
    Route::delete('/admin/websites/{website}', [AdminController::class, 'destroy'])->name('admin.websites.destroy');
});


Auth::routes();
Route::get('/create', [WebsiteController::class, 'addWebsite'])->name('websites.create');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

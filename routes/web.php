<?php

use App\Http\Controllers\LicenseController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VehicleController;
use App\Http\Controllers\WeightController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::resource('license', LicenseController::class);
Route::resource('user', UserController::class);
Route::resource('vehicle', VehicleController::class);

// 1. กำหนดหน้าแรกให้แสดงผลจาก WeightController
Route::get('/', [WeightController::class, 'index']);

// เอา 'index' ออกจาก except เพื่อให้เข้า URL /weights แบบ GET ได้
Route::resource('weights', WeightController::class)->except(['create', 'edit']);

// 2. Route Dashboard และ Profile
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// 3. Route Gallery
Route::get("/gallery", function () {
    $ant = "https://cdn3.movieweb.com/i/article/Oi0Q2edcVVhs4p1UivwyyseezFkHsq/1107:50/Ant-Man-3-Talks-Michael-Douglas-Update.jpg";
    $bird = "https://images.indianexpress.com/2021/03/falcon-anthony-mackie-1200.jpg";
    $cat = "https://www.sideshow.com/cdn-cgi/image/height=850,quality=90,f=auto/https://www.sideshow.com/storage/product-images/910233/black-panther-deluxe_marvel_gallery_61eb5a329c25b.jpg";
    $god = "https://www.blackoutx.com/wp-content/uploads/2021/04/Thor.jpg";
    $spider = "https://i.redd.it/n9ohicnpiskb1.jpg";

    return view("test/index", compact("ant", "bird", "cat", "god", "spider"));
});

Route::get("/gallery/ant", function () {
    $ant = "https://cdn3.movieweb.com/i/article/Oi0Q2edcVVhs4p1UivwyyseezFkHsq/1107:50/Ant-Man-3-Talks-Michael-Douglas-Update.jpg";
    return view("test/ant", compact("ant"));
});

Route::get("/gallery/bird", function () {
    $bird = "https://images.indianexpress.com/2021/03/falcon-anthony-mackie-1200.jpg";
    return view("test/bird", compact("bird"));
});

Route::get("/gallery/cat", function () {
    $cat = "https://www.sideshow.com/cdn-cgi/image/height=850,quality=90,f=auto/https://www.sideshow.com/storage/product-images/910233/black-panther-deluxe_marvel_gallery_61eb5a329c25b.jpg";
    return view("test/cat", compact("cat"));
});

// 4. Route Active Pages
Route::get('/active/index', function () {
    return view('active/index');
})->name('index');

Route::get('/active/about', function () {
    return view('active/about');
})->name('about');

Route::get('/active/services', function () {
    return view('active/services');
})->name('services');

Route::get('/active/portfolio', function () {
    return view('active/portfolio');
})->name('portfolio');

Route::get('/active/team', function () {
    return view('active/team');
})->name('team');

Route::get('/active/blog', function () {
    return view('active/blog');
})->name('blog');

Route::get('/active/contact', function () {
    return view('active/contact');
})->name('contact');

Route::get('/about-me', function () {
    return view('about-me');
});

require __DIR__ . '/auth.php';
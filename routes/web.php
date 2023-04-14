<?php

use App\Http\Controllers\OrderController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect()->intended(RouteServiceProvider::HOME);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/users', [UserController::class, 'index'])->name('users');

    //Product routes
    Route::get('/products', [ProductController::class, 'index'])->name('product.index');
    Route::get('/products/create', [ProductController::class, 'create'])->name('product.create');
    Route::post('/products/store', [ProductController::class, 'store'])->name('product.store');
    Route::get('/products/{product}/edit', [ProductController::class, 'edit'])->name('product.edit');
    Route::patch('/products/{product}', [ProductController::class, 'update'])->name('product.update');
    Route::delete('/products/{product}', [ProductController::class, 'destroy'])->name('product.destroy');

    //Order routes
    Route::get('/orders', [OrderController::class, 'index'])->name('order.index');
    Route::get('/orders/{order}', [OrderController::class, 'show'])->name('order.show');
    Route::post('/orders/{order}/complete', [OrderController::class, 'complete'])->name('order.complete');
    Route::post('/orders/{order}/cancel', [OrderController::class, 'cancel'])->name('order.cancel');

    //Pages route
    Route::get('/pages', [PageController::class, 'index'])->name('page.index');
    Route::get('/pages/create', [PageController::class, 'create'])->name('page.create');
    Route::post('/pages', [PageController::class, 'store'])->name('page.store');
    Route::get('/pages/{page}', [PageController::class, 'show'])->name('page.show');
    Route::get('/pages/{page}/edit', [PageController::class, 'edit'])->name('page.edit');
    Route::patch('/pages/{page}', [PageController::class, 'update'])->name('page.update');
    Route::delete('/pages/{page}', [PageController::class, 'destroy'])->name('page.destroy');
    Route::post('/pages/{page}/archive', [PageController::class, 'archive'])->name('page.archive');
    Route::post('/pages/{page}/restore', [PageController::class, 'restore'])->name('page.restore');;
});

require __DIR__.'/auth.php';

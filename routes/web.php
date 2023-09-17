<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [PostController::class, 'index'])
    ->name('root');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Route::resource('posts', PostController::class)
//     ->only(['edit', 'show', 'update', 'destroy'])
//     ->middleware('auth');//ログインしないといじれない

// Route::resource('posts', PostController::class)
//     ->only(['store','create']);//誰でもいじれる

Route::resource('posts', PostController::class)
    ->only(['create', 'store']);

Route::resource('posts', PostController::class)
    ->except(['create', 'store'])
    ->middleware('auth');

Route::get('/markers', [PostController::class, 'markers'])
    ->name('markers');


require __DIR__ . '/auth.php';

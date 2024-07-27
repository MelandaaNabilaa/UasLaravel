<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {
    Route::get("/", [PostController::class, "index"])->name("home");
    Route::post("/logout", [PostController::class, "logout"])->name("logout");

    Route::resource('/posts', PostController::class)->except(['create', 'show', 'edit']);
    Route::get('/view/{code}', [PostController::class, "view"])->name("posts.view");
    Route::get('/add', [PostController::class, 'add'])->name('posts.add');
    Route::get('/edit/{code}', [PostController::class, "edit"])->name("posts.edit");
    Route::get('/pdf', [PostController::class, 'generatePDF'])->name('posts.pdf');
});

Route::middleware('guest')->group(function () {
    Route::get('/register', [ProfileController::class, 'registerForm'])->name("profile.register.form");
    Route::post('/register', [ProfileController::class, 'register'])->name("profile.register");
    Route::get('/login', [ProfileController::class, 'loginForm'])->name("profile.login.form");
    Route::post('/login', [ProfileController::class, 'login'])->name("profile.login");
});

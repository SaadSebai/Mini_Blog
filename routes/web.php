<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/home/filter', [HomeController::class, 'search'])->name('post.filter');
Route::get('/home/filter/{published}', [HomeController::class, 'searchPublished'])->name('post.filter.published');

Route::get('/users', [UserController::class, 'index'])->name('users');
Route::put('/users/{user}', [UserController::class, 'block'])->name('users.block');

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::post('/login', [UserController::class, 'login']);

Route::get('/post/user/{user}', [PostController::class, 'userPosts'])->name('post.user');
Route::get('/post/add', [PostController::class, 'add'])->name('post.add');
Route::get('/post/edit/{post}', [PostController::class, 'edit'])->name('post.edit');
Route::post('/post/create', [PostController::class, 'store'])->name('post.create');
Route::put('/post/update/{post}', [PostController::class, 'update'])->name('post.update');
Route::put('/post/publish/{post}', [PostController::class, 'publish'])->name('post.publish');
Route::put('/post/unpublish/{post}', [PostController::class, 'unpublish'])->name('post.unpublish');
Route::delete('/post/delete/{post}', [PostController::class, 'destroy'])->name('post.delete');

Route::get('/categories', [CategoryController::class, 'index'])->name('categories');
Route::post('/categories/create', [CategoryController::class, 'store'])->name('categories.create');
Route::get('/categories/edit/{category}', [CategoryController::class, 'edit'])->name('categories.edit');
Route::put('/categories/update/{category}', [CategoryController::class, 'update'])->name('categories.update');
Route::delete('/categories/delete/{category}', [CategoryController::class, 'destroy'])->name('categories.delete');

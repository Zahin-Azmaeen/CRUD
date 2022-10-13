<?php

use App\Http\Controllers\PostController;
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



Route::get('/add-post', [PostController::class, 'addpost']);
Route::post('/create-post', [PostController::class, 'createPost'])->name('post.create');
Route::get('/posts', [PostController::class, 'getPost'])->name('post.getPost');
Route::get('/getPostQuery', [PostController::class, 'getPostQuery'])->name('post.getPostQuery');
Route::get('/posts/{id}', [PostController::class, 'getPostById'])->name('post.getPostById');
Route::get('/delete-post/{id}', [PostController::class, 'deletePost'])->name('post.deletePost');
Route::get('/edit-post/{id}', [PostController::class, 'editPost'])->name('post.editpost');
Route::post('/update-post', [PostController::class, 'updatePost'])->name('post.updatePost');

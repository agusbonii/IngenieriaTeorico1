<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;

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

Route::redirect('/', '/auth/login', 301);
Route::redirect('/login', '/auth/login', 301);
Route::redirect('/register', '/auth/register', 301);


Route::get('/auth/register', function () { return view('user.register'); })
-> name("register")
-> middleware("guest");

Route::post('/auth/register', [UserController::class, "Register"])
-> name("register")
-> middleware("guest");

Route::get('/auth/login', function () { return view('user.login'); })
-> name("login")
-> middleware("guest");

Route::post('/auth/login', [UserController::class, "Login"])
-> name("login")
-> middleware("guest");

Route::get('/user/modify', function () { return view('user.profile'); })
-> name("profile")
-> middleware("auth");

Route::post('/user/modify', [UserController::class, "Modify"])
-> name("profile")
-> middleware("auth");

Route::get('/user/delete', function() { return view('user.deleteuser'); })
-> name("deleteUser")
-> middleware("auth");

Route::post('/user/delete', [UserController::class, "Delete"])
-> name("deleteUser")
-> middleware("auth");

Route::get('/user/logout', [UserController::class, "Logout"])
-> name("logout")
-> middleware("auth");

Route::get('/blog', [PostController::class, "getPosts"])
-> name("home")
-> middleware("auth");

Route::get('/blog/add', function () { return view('blog.addPost'); })
-> name("blog.add")
-> middleware("auth");

Route::post('/blog/add', [PostController::class, 'Create'])
-> name("blog.add")
-> middleware("auth");

Route::get('/blog/edit/{index}', function () { return view('blog.addPost'); })
-> name("blog.edit")
-> middleware("auth");

Route::post('/blog/edit', [PostController::class, 'Edit'])
-> name("blog.edit")
-> middleware("auth");

#/blog/delete

Route::get('/blog/myposts', [PostController::class, "getMyPosts"])
-> name("myPosts")
-> middleware("auth");

Route::get('/blog/{index}', [PostController::class, "getPost"])
-> name("blog.index")
-> middleware("auth");

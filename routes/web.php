<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Posts;
use App\Http\Controllers\About;
use App\Http\Controllers\Contact;
use App\Http\Controllers\User;
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
    return view('home');
});

Route::get('/about', [About::class, 'index']);
Route::get('/contact',  [Contact::class, 'index']);

Route::get('/posts/{postId}', [Posts::class, 'index']);
Route::get('/posts', [Posts::class, 'showAll']);
Route::post('/posts', 'Posts@save');

Route::get('/user/{name}', [User::class, 'hello']);

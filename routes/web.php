<?php

use App\Models\Post;
use App\Models\User;
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

Route::get('/users/{id}/posts', function($id) {
    $usersPosts = User::whereId($id)->with('posts')->get();
    return response($usersPosts);
});

Route::get('posts/{id}/users', function ($id) {
    $postUser = Post::whereId($id)->with('user')->get();
    return response($postUser);
});

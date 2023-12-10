<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Models\Post;
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

Route::get('/', function () {
  return view('welcome');
});

Route::get('/dashboard', function () {
  return view('dashboard', ["posts" => Post::all()]);
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
  Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
  Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
  Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Blog Post

Route::middleware('auth')->group(function () {
  Route::get('/create-post', function () {
    return view('create-post');
  })->name('create-post');
  Route::post('/create-post', [PostController::class, 'createPost'])->name('post.store');

  Route::get('/my-posts', function () {
    return view('my-posts');
  })->name('my-posts');

  Route::get("/edit-post/{post}", [PostController::class, "showEdit"]);
  Route::put("/edit-post/{post}", [PostController::class, "updatePost"]);
  Route::delete("/delete-post/{post}", [PostController::class, "deletePost"]);

  Route::get("/post/{post}", [PostController::class, "showPost"]);
});


require __DIR__ . '/auth.php';

<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

public function add(){
    return view('posts.add');
}

Route::get('/view', [PostController::class, 'view'])->name('posts.view');
Route::get('/add', [PostController::class, 'add'])->name('posts.add');
Route::get('/edit', [PostController::class, 'edit'])->name('posts.edit');
Route::get('/login', [PostController::class, 'login'])->name('posts.login');

//Route::get('/', function() {
// return view('posts.index');
// });
Route::get('/', [PostController::class, 'index']);
//Route untuk resource post
Route::resource('/posts', PostController::class);

Route::get('/view', [PostController::class, 'view'])->name('posts.view');
Route::get('/add', [PostController::class, 'add'])->name('posts.add');
Route::get('/edit/{code}', [PostController::class, 'edit'])->name('posts.edit');
Route::get('/login', [PostController::class, 'login'])->name('posts.login');


public function destroy($id)
{
    $post = Post::findOrFail($id);

    if ($post->image){
        Storage::disk('public')->delete($post->image);
    }

    $post->delete();

    return redirect()->route('posts.index')->width('success', 'Post deleted successfully');
}
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function add()
    {
        return view('posts.add');
    }

    public function view()
    {
        return view('posts.view');
    }

    public function edit($code)
    {
        return view('posts.edit', compact('code'));
    }

    public function login()
    {
        return view('posts.login');
    }

    public function index()
    {
        return view('posts.index');
    }

    public function destroy($id)
    {
        $post = Post::findOrFail($id);

        if ($post->image) {
            Storage::disk('public')->delete($post->image);
        }

        $post->delete();

        return redirect()->route('posts.index')->with('success', 'Post deleted successfully');
    }
}

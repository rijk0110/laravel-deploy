<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
{
    $posts = Post::all();
    return view('posts.index', compact('posts'));
}

public function create()
{
    return view('posts.create');
}

public function store(Request $request)
{
    Post::create($request->validate([
        'title' => 'required|string',
        'body' => 'required|string',
    ]));

    return redirect()->route('posts.index');
}

public function show(Post $post)
{
    return view('posts.show', compact('post'));
}

public function edit(Post $post)
{
    return view('posts.edit', compact('post'));
}

public function update(Request $request, Post $post)
{
    $post->update($request->validate([
        'title' => 'required|string',
        'body' => 'required|string',
    ]));

    return redirect()->route('posts.index');
}

public function destroy(Post $post)
{
    $post->delete();
    return redirect()->route('posts.index');
}
}

<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::latest()->with('user')->paginate(5);
        return view('posts.index', compact('posts'));
    }

    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    public function create()
    {
        return view('posts.create');
    }
    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|unique:posts,title,except,id',
            'body' => 'required',
        ]);

        auth()->user()->posts()->create($request->only('title', 'body'));

        return redirect()->route('posts.index')->with('success', 'Post created!');
    }
    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title' => 'required|unique:posts,title,except,id',
            'body' => 'required',
        ]);

        $post->update($request->only('title', 'body'));

        return redirect()->route('posts.edit', $post)->with('success', 'Post updated!');
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('posts.index')->with('success', 'Post deleted!');
    }

}

<?php

namespace App\Http\Controllers;

use App\Models\Post;

class PostController extends Controller
{

    /**
     * Show the main page post
     */
    public function index()
    {

        $posts = Post::getCacheAllPost(10);

        return view('post.index', compact('posts'));
    }

    /**
     * Show the desired resource
     */
    public function show(Post $post)
    {
        $post = Post::getCachePost($post);

        return view('post.show', compact('post'));
    }
}

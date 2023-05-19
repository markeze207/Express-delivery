<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Post\StoreRequest;
use App\Http\Requests\Admin\Post\UpdateRequest;
use App\Models\Post;
use App\Service\Admin\Post\Service;

class PostController extends Controller
{

    protected Service $postService;

    /**
     * Get service
     */
    public function __construct(Service $postService)
    {
        $this->postService = $postService;
    }

    /**
     * Show the posts list
     */
    public function index()
    {
        $posts = Post::orderBy('created_at', 'desc')->paginate(10);
        return view('admin.post.index', compact('posts'));
    }

    /**
     * Show the form for creating a new post.
     */
    public function create()
    {
        return view('admin.post.create');
    }

    /**
     * Store a newly created post in storage.
     */
    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        $this->postService->store($data);

        return redirect()->route('admin.post.index');
    }

    /**
     * Display the specified post edit form.
     */
    public function edit(Post $post)
    {
        return view('admin.post.edit', compact('post'));
    }

    /**
     * Update the specified post in storage.
     */
    public function update(UpdateRequest $request, Post $post)
    {
        $data = $request->validated();
        $this->postService->update($data, $post);

        return redirect()->route('admin.post.index');
    }

    /**
     * Remove the specified post from storage.
     */
    public function destroy(Post $post)
    {
        unlink(public_path($post->photo)); // Delete image
        $post->delete();
    }

}

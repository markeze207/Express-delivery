<?php

namespace App\Events;

use App\Models\Post;

abstract class PostEvent
{
    private Post $post;

    public function __construct(Post $post) {
        $this->post = $post;
    }

    public function getPost(): Post {
        return $this->post;
    }
}

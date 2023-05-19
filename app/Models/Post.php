<?php

namespace App\Models;

use App\Events\PostDeleted;
use App\Events\PostSaved;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class Post extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $dispatchesEvents = [
        'saved' => PostSaved::class,
        'deleted' => PostDeleted::class,
    ];

    static public function getCacheMainPage($limit)
    {
        $key = 'MainPage_Posts';
        return Cache::tags('Posts')->rememberForever($key, function () use ($limit) {
           return self::orderBy('created_at', 'desc')->limit($limit)->get();
        });

    }

    static public function getCacheAllPost($paginate)
    {
        $key = 'Posts_All';
        return Cache::tags('Posts')->rememberForever($key, function () use ($paginate) {
            return self::orderBy('created_at', 'desc')->paginate($paginate);
        });
    }

    static public function getCachePost(Post $post)
    {
        $key = 'Post_'.$post->id;
        return Cache::tags('Posts')->rememberForever($key, function () use ($post) {
            return $post;
        });
    }
}

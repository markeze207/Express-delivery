<?php

namespace App\Cache;

use App\Events\PostEvent;
use Illuminate\Support\Facades\Cache;

class ClearPostCache
{
    public function handle(PostEvent $event)
    {
        Cache::tags('Posts')->flush();
    }
}

<?php

namespace App\Service\Admin\Post;

use App\Models\Post;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class Service
{

    public function store($data)
    {
        try {
            Db::beginTransaction();

            $photoPut = Storage::put('public/images/public/', $data['photo']); // Upload new photo in storage
            $data['photo'] = Storage::url($photoPut); // Save url path in database

            Post::create($data); // Create post

            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            return $exception->getMessage();
        }
        return true;
    }

    public function update($data, Post $post)
    {
        try {
            Db::beginTransaction();

            if(isset($data['photo'])) // Check if the photo is uploaded for updating
            {
                $photoPut = Storage::put('public/images/public/', $data['photo']); // Upload new photo in storage
                $data['photo'] = Storage::url($photoPut); // Save url path in database
                unlink(public_path($post->photo)); // Delete old photo
            }

            $post->update($data); // Update post

            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            return $exception->getMessage();
        }

        return true;
    }

}

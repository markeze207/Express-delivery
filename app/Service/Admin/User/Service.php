<?php

namespace App\Service\Admin\User;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class Service
{

    public function update($data, User $user)
    {
        try {
            Db::beginTransaction();

            if (isset($data['resetPassword'])) // Check whether the "Reset password" button is pressed
            {
                $data['password'] = Hash::make(Str::random(10));
                unset($data['resetPassword']);

            }

            $user->update($data); // Update post

            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            return $exception->getMessage();
        }

        return true;
    }

}

<?php

namespace App\Traits;

use Illuminate\Support\Facades\DB;

trait Login{

    public function reset_pass($data)
    {
        return DB::table('password_resets')
                    ->insert([
                        'email' => $data['email'],
                        'token' => $data['token'],
                        'created_at' => $data['created_at'],
                        'expires_in' => $data['expires_in']
                    ]);
    }
}

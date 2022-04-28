<?php

namespace App\Http\Repositories;

use App\User;

class AuthRepository {
    protected $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

}

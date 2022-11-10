<?php

namespace App\Policies;

use App\Models\Akses;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;


class AdminPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function admin(User $user)
    {
        return $user->akses_id == 1;
    }
    public function warga(User $user)
    {
        return $user->akses_id == 2;
    }
}

<?php

namespace App\Policies;

use App\Models\Apiary;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ApiaryPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can update the apiary.
     */
    public function update(User $user, Apiary $apiary): bool
    {
        return $user->id === $apiary->user_id;
    }

    /**
     * Determine whether the user can delete the apiary.
     */
    public function delete(User $user, Apiary $apiary): bool
    {
        return $user->id === $apiary->user_id;
    }
}

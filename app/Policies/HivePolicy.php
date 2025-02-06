<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Hive;
use Illuminate\Auth\Access\HandlesAuthorization;

class HivePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can update the hive.
     */
    public function update(User $user, Hive $hive): bool
    {
        return $user->id === $hive->apiary->user_id;
    }

    /**
     * Determine whether the user can delete the hive.
     */
    public function delete(User $user, Hive $hive): bool
    {
        return $user->id === $hive->apiary->user_id;
    }
}

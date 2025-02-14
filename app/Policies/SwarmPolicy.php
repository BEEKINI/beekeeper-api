<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Swarm;
use Illuminate\Auth\Access\HandlesAuthorization;

class SwarmPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the hive.
     */
    public function view(User $user, Swarm $swarm): bool
    {
        return $user->id === $swarm->hive->apiary->user_id;
    }

    /**
     * Determine whether the user can update the hive.
     */
    public function update(User $user, Swarm $swarm): bool
    {
        return $user->id === $swarm->hive->apiary->user_id;
    }

    /**
     * Determine whether the user can delete the hive.
     */
    public function delete(User $user, Swarm $swarm): bool
    {
        return $user->id === $swarm->hive->apiary->user_id;
    }
}

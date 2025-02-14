<?php

namespace App\Policies;

use App\Models\Intervention;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class InterventionPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any interventions.
     *
     * @param User $user
     * @return mixed
     */
    public function viewAny(User $user): bool
    {
        return false;
    }

    /**
     * Determine whether the user can view the intervention.
     *
     * @param User $user
     * @param Intervention $intervention
     * @return bool
     */
    public function view(User $user, Intervention $intervention): bool
    {
        if ($user->id === $intervention->apiary->user_id) {
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can create interventions.
     *
     * @param User $user
     * @return mixed
     */
    public function create(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can update the intervention.
     *
     * @param User $user
     * @param Intervention $intervention
     * @return bool
     */
    public function update(User $user, Intervention $intervention): bool
    {
        if ($user->id === $intervention->apiary->user_id) {
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can delete the intervention.
     *
     * @param User $user
     * @param Intervention $intervention
     * @return bool
     */
    public function delete(User $user, Intervention $intervention): bool
    {
        if ($user->id === $intervention->apiary->user_id) {
            return true;
        }
        return false;
    }
}

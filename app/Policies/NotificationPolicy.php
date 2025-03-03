<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Notification;
use Illuminate\Auth\Access\HandlesAuthorization;

class NotificationPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can delete the apiary.
     */
    public function delete(User $user, Notification $notification): bool
    {
        return $user->id === $notification->user_id;
    }
}

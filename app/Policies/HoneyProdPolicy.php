<?php

namespace App\Policies;

use App\Models\Apiary;
use App\Models\HoneyProd;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class HoneyProdPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user, Apiary $apiary): bool
    {
        if ($user->id === $apiary->user_id) {
            return true;
        }
        return false;
    }

    public function view(User $user, HoneyProd $honeyProd): bool
    {
        if ($user->id === $honeyProd->apiary->user_id) {
            return true;
        }
        return false;
    }

    public function create(User $user, Apiary $apiary): bool
    {
        if ($user->id === $apiary->user_id) {
            return true;
        }
        return false;
    }

    public function update(User $user, HoneyProd $honeyProd): bool
    {
        if ($user->id === $honeyProd->apiary->user_id) {
            return true;
        }
        return false;
    }

    public function delete(User $user, HoneyProd $honeyProd): bool
    {
        if ($user->id === $honeyProd->apiary->user_id) {
            return true;
        }
        return false;
    }

}

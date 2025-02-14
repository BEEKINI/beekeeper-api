<?php

namespace App\Providers;

use App\Models\Apiary;
use App\Models\Intervention;
use App\Policies\ApiaryPolicy;
use App\Policies\InterventionPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        Apiary::class => ApiaryPolicy::class,
        Intervention::class => InterventionPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();
    }
}

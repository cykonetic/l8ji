<?php

namespace App\Providers;

use App\Models\User;
use Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        // Alow Super users to do anything
        Gate::before(function (User $user, mixed $permisisson) {
            // must return null if not super user to continue checks
            if ($user->hasRole('Super')) {
                return true;
            }
        });
    }
}

<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\User;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();

        // Simple role-based gates
        Gate::define('role', function (User $user, string $role) {
            return optional($user->role)->name === $role;
        });

        // Admin can do anything
        Gate::before(function (?User $user) {
            if ($user && optional($user->role)->name === 'admin') {
                return true;
            }
            return null;
        });
    }
}

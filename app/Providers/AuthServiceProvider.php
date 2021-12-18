<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

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

        //
        Gate::define('admin', function ($user) {
            if ($user->level == 3){
                return true;
            }
            return false;
        });

        Gate::define('write', function ($user) {
            if ($user->level == 1){
                return true;
            }
            return false;
        });

        Gate::define('read', function ($user) {
            if ($user->level == 0){
                return true;
            }
            return false;
        });


    }
}

<?php

namespace App\Providers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
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

        Gate::define('update-post', function (User $user, Post $post) {
            if($user->role_id === 1) {
                return true;
            } else if ($user->role_id === 2) {
                return $user->id === $post->user_id;
            } else {
                return false;
            }            
        });

        Gate::define('update-category', function (User $user) {
           return $user->role_id === 1;
        });

        Gate::define('show-users', function (User $user) {
            return $user->role_id == 1;
        });    
    }
}

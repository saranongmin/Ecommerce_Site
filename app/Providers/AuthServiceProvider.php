<?php

namespace App\Providers;

use App\Blog;
use App\Policies\BlogPolicy;
use App\Policies\ProductPolicy;
use App\Policies\UserPolicy;
use App\Product;
use App\User;
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
        // 'App\Model' => 'App\Policies\ModelPolicy',
        User::class => UserPolicy::class,
        Blog::class => BlogPolicy::class,
        Product::class => ProductPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

       Gate::define('update-blog', function ($user, $blog) {
           return $user->id === $blog->created_by;
       });

        Gate::resource('users', 'App\Policies\UserPolicy');
        Gate::resource('blogs', 'App\Policies\BlogPolicy');
        Gate::resource('products', 'App\Policies\ProductPolicy');

    }
}

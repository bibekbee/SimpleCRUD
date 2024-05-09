<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;



class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {

        // Gate::define('edit', function (User $user = null, Newjobs $job) {
        //     return $job->employer->user->is($user);
        // });
        // Paginator::useTailwind();
       
    }
}

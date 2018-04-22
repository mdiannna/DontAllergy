<?php

namespace App\Providers;

use App\Models\Group;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(Group $group)
    {
        // $groups = $group->all();
        // view()->share('groups', $groups);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}

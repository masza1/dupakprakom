<?php

namespace App\Providers;

use App\Models\Group;
use App\Models\Position;
use App\Models\Unit;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $units = Unit::get();
        $groups = Group::get();
        $positions = Position::get();

        view()->share(['units' => $units, 'groups' => $groups, 'positions' => $positions]);
    }
}

<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer(['cpadmin.modules.event.listuser','cpadmin.modules.user.index','cpadmin.modules.user.create','cpadmin.modules.user.edit','cpadmin.modules.evaluate.show','lead.user.create','lead.user.index','lead.evaluate.show','lead.profile','user.evaluate.show','cpadmin.modules.user.show'],'App\Http\ViewComposers\InforComposer');
        view()->composer(['cpadmin.modules.evaluate.add'],'App\Http\ViewComposers\userComposers');
    }
}

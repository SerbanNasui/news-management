<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $routes = \Route::getRoutes();
        $exceptions = [
            'debugbar.openhandler',
            'debugbar.clockwork',
            'debugbar.assets.css',
            'debugbar.assets.js',
            'debugbar.cache.delete',
            'login',
            'logout',
            'password',
            'dashboard',
            'password.request',
            'password.email',
            'password.reset',
            'password.update',
            'password.confirm',
            'home',
            'backoffice.index',
            'show.articles.from.category',
            'display.article',
            'display.weather',
            'increment.views',
            'backoffice.ajaxDashboardLoader'
        ];

        $exceptions = collect($exceptions);

        foreach ($routes as $route) {
            if ($route->getName() != null) {
                if ($exceptions->contains($route->getName()) == false) {
                    $routeName = $route->getName();
                    Permission::firstOrCreate(['name' => $route->getName()],['name' => $route->getName()]);
                }
            }
        }
    }
}

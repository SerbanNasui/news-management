<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = Role::firstOrCreate(['name'=>'admin'], [
            'name'=>'admin',
            'guard_name'=>'web',
        ]);
        $writer = Role::firstOrCreate(['name'=>'writer'], [
            'name'=>'writer',
            'guard_name'=>'web',
        ]);
        $publisher = Role::firstOrCreate(['name'=>'publisher'], [
            'name'=>'publisher',
            'guard_name'=>'web',
        ]);

        $writer->givePermissionTo(['news.index', 'news.create', 'news.store', 'news.show', 'news.update', 'news.destroy', 'profile.index', 'profile.create', 'profile.update', 'profile.change.password']);
        $publisher->givePermissionTo(['manage.news.index', 'manage.news.publish', 'manage.news.filter-by-writer', 'manage.news.highlights', 'manage.news.highlight.article', 'manage.news.preview.article', 'profile.index', 'profile.create.or.update', 'profile.change.password']);

    }
}

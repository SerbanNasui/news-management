<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::firstOrCreate(['email'=>'admin@admin.com'],[
            'name'=>'admin',
            'email'=>'admin@admin.com',
            'password'=>Hash::make('secret'),
        ]);

        $writer = User::firstOrCreate(['email'=>'writer@writer.com'],[
            'name'=>'writer',
            'email'=>'writer@writer.com',
            'password'=>Hash::make('secret'),
        ]);

        $publisher = User::firstOrCreate(['email'=>'publisher@publisher.com'],[
            'name'=>'publisher',
            'email'=>'publisher@publisher.com',
            'password'=>Hash::make('secret'),
        ]);

        $admin->assignRole('admin');
        $writer->assignRole('writer');
        $publisher->assignRole('publisher');
    }
}

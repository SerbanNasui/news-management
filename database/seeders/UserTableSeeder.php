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
        $admin = User::firstOrCreate(['email'=>'admin@newsdirect.com'],[
            'name'=>'John Doe',
            'email'=>'admin@newsdirect.com',
            'password'=>Hash::make('secret'),
        ]);

        $writer1 = User::firstOrCreate(['email'=>'johnatan_ive@newsdirect.com'],[
            'name'=>'Johnathan Ive',
            'email'=>'johnatan_ive@newsdirect.com',
            'password'=>Hash::make('secret'),
        ]);

        $writer2 = User::firstOrCreate(['email'=>'maria_jones@newsdirect.com'],[
            'name'=>'Maria Jones',
            'email'=>'maria_jones@newsdirect.com',
            'password'=>Hash::make('secret'),
        ]);

        $writer3 = User::firstOrCreate(['email'=>'jeremy_taylor@newsdirect.com'],[
            'name'=>'Jeremy Taylor',
            'email'=>'jeremy_taylor@newsdirect.com',
            'password'=>Hash::make('secret'),
        ]);

        $publisher1 = User::firstOrCreate(['email'=>'sara_smith@newsdirect.com'],[
            'name'=>'Sara Smith',
            'email'=>'sara_smith@newsdirect.com',
            'password'=>Hash::make('secret'),
        ]);

        $publisher2 = User::firstOrCreate(['email'=>'paul_brown@newsdirect.com'],[
            'name'=>'Paul Brown',
            'email'=>'paul_brown@newsdirect.com',
            'password'=>Hash::make('secret'),
        ]);

        $admin->assignRole('admin');
        $writer1->assignRole('writer');
        $writer2->assignRole('writer');
        $writer3->assignRole('writer');
        $publisher1->assignRole('publisher');
        $publisher2->assignRole('publisher');
    }
}

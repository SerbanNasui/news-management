<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\UserProfile;
use App\Services\UploadImageService;
use Illuminate\Database\Seeder;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
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


        $avatar1 = public_path('seeders/avatars/avatar1.png');
        $avatar2 = public_path('seeders/avatars/avatar2.png');
        $avatar3 = public_path('seeders/avatars/avatar3.jpeg');
        $avatar4 = public_path('seeders/avatars/avatar4.jpeg');
        $avatar5 = public_path('seeders/avatars/avatar5.png');

        $av1 = (new Request())->merge(['avatar' => new UploadedFile($avatar1, 'avatar1.png')]);
        $av2 = (new Request())->merge(['avatar' => new UploadedFile($avatar2, 'avatar2.png')]);
        $av3 = (new Request())->merge(['avatar' => new UploadedFile($avatar3, 'avatar3.jpeg')]);
        $av4 = (new Request())->merge(['avatar' => new UploadedFile($avatar4, 'avatar4.jpeg')]);
        $av5 = (new Request())->merge(['avatar' => new UploadedFile($avatar5, 'avatar5.png')]);

        UserProfile::firstOrCreate(['user_id'=>$writer1->id],[
            'user_id'=>$writer1->id,
            'avatar'=>(new UploadImageService())->uploadAvatar($av1, $writer1),
        ]);

        UserProfile::firstOrCreate(['user_id'=>$writer2->id],[
            'user_id'=>$writer2->id,
            'avatar'=>(new UploadImageService())->uploadAvatar($av3, $writer2),
        ]);

        UserProfile::firstOrCreate(['user_id'=>$writer3->id],[
            'user_id'=>$writer3->id,
            'avatar'=>(new UploadImageService())->uploadAvatar($av4, $writer3),
        ]);

        UserProfile::firstOrCreate(['user_id'=>$publisher1->id],[
            'user_id'=>$publisher1->id,
            'avatar'=>(new UploadImageService())->uploadAvatar($av2, $publisher1),
        ]);

        UserProfile::firstOrCreate(['user_id'=>$publisher2->id],[
            'user_id'=>$publisher2->id,
            'avatar'=>(new UploadImageService())->uploadAvatar($av5, $publisher2),
        ]);
    }
}

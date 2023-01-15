<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // DB::table('users')->insert([
        //     'name' => 'Admin Admin',
        //     'email' => 'admin@paper.com',
        //     'email_verified_at' => now(),
        //     'password' => Hash::make('secret'),
        //     'created_at' => now(),
        //     'updated_at' => now()
        // ]);

        User::updateOrCreate(
            [
                'email' => 'superadmin@catfish.com',
            ],
            [
                'name' => 'Superadmin',
                'email' => 'superadmin@catfish.com',
                'email_verified_at' => now(),
                'password' => Hash::make('secret123'),
                'role' => 'superadmin',
                'created_at' => now(),
                'updated_at' => now()
            ]
        );

        User::updateOrCreate(
            [
                'email' => 'admin@catfish.com',
            ],
            [
                'name' => 'Admin',
                'email' => 'admin@catfish.com',
                'email_verified_at' => now(),
                'password' => Hash::make('secret123'),
                'role' => 'admin',
                'created_at' => now(),
                'updated_at' => now()
            ]
        );

        User::updateOrCreate(
            [
                'email' => 'user@catfish.com',
            ],
            [
                'name' => 'User',
                'email' => 'user@catfish.com',
                'email_verified_at' => now(),
                'password' => Hash::make('secret123'),
                'role' => 'user',
                'created_at' => now(),
                'updated_at' => now()
            ]
        );
    }
}

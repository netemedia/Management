<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * @return void
     */
    public function run()
    {
        $users = config('data.users');
        foreach ($users as $user) {
            User::create(
                [
                    'name' => $user['name'],
                    'email' => $user['email'],
                    'email_verified_at' => now(),
                    'password' => bcrypt('none'),
                    'remember_token' => Str::random(),
                    'created_at' => now(),
                    'updated_at' => now(),
                ]
            );
        }
    }
}

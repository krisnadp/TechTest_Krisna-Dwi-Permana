<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class CreateUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            [
                'name' => 'Admin',
                'email' => 'admin@gmail.com',
                'role' => '0',
                'password' => bcrypt('12345678'),
            ],
            [
                'name' => 'Investor',
                'email' => 'invest@gmail.com',
                'role' => '1',
                'password' => bcrypt('12345678'),
            ],
            [
                'name' => 'User',
                'email' => 'user@gmail.com',
                'role' => '2',
                'password' => bcrypt('12345678'),
            ],
        ];

        foreach ($user as $key => $value) {
            User::create($value);
        }
    }
}

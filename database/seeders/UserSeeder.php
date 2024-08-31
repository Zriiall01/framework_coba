<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $dataUsers = [
            [
                'name' => 'Zriiall',
                'email' => 'Rizal@gmail.com',
                'password' => bcrypt('Riz0105'),
            ]
        ];

        foreach ($dataUsers as $user) {
            User::create($user);
        }
    }

    
}

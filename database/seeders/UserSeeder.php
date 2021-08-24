<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
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
                'name' => 'admin',
                'email' => 'admin@gmail.com',
                'password' => bcrypt('admin123'),
                'nohp' => '0812 1235 3211',
                'alamat' => 'Yogyakarta',
                'level' => 'ADMIN',
            ],
            [
                'name' => 'user',
                'email' => 'user@gmail.com',
                'password' => bcrypt('user123'),
                'nohp' => '0812 1236 1211',
                'alamat' => 'Surabaya',
                'level' => 'USER',
            ]
        ];
        foreach ($user as $key => $value) {
            User::create($value);
        }
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\UsersTableSeeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'user1',
            'email' => 'user1@gmail.com',
            'password' => bcrypt('12345678'),
            'estat' => 1,
            'rol' => 1
        ]);
    }
}

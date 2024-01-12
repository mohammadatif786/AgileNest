<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
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
         // Create an admin user
         User::factory()->create([
            'name' => 'Admin User',
            'email' => 'admin@gmail.com',
            'role' => 'Admin',
        ]);

        // Create a manager user
        User::factory()->create([
            'name' => 'Manager User',
            'email' => 'manager@gmail.com',
            'role' => 'Manager',
        ]);
        User::factory()->create([
            'name' => 'User',
            'email' => 'user@gmail.com',
            'role' => 'user',
        ]);

        // Create regular user(s)
        User::factory()->count(5)->create();
    }
}

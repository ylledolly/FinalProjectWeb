<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\UserLogin;

class UserLoginSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        UserLogin::create([
            'username' => 'admin',
            'birthday' => '2000-01-01', 
            'password' => bcrypt('admin123'), 
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Landing;

class LandingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Landing::factory()->count(3)->create();

        Landing::create([
            'title' => 'First Book Title',
            'rating' => 4, 
            'author' => 'First Book Author',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}

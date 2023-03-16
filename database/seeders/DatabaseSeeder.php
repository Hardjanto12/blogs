<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();
        // \App\Models\Category::factory(3)->create();
        \App\Models\Article::factory(20)->create();
        \App\Models\Category::factory()->create([
            'category_name' => 'Actress'
        ]);
        \App\Models\Category::factory()->create([
            'category_name' => 'Esports Ladies'
        ]);
        \App\Models\Category::factory()->create([
            'category_name' => 'Tiktok Artists'
        ]);

        \App\Models\User::factory()->create([
            'name' => 'Winnnskie',
            'email' => 'winnnskie@gmail.com',
            'password' => bcrypt('12345678'),
        ]);
    }
}

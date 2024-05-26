<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // User::factory(10)->create();
        User::factory()->create([
            'name' => 'João Victor',
            'email' => 'joaovsq@hotmail.com',
            'password' => bcrypt('123456'),
            'photo' => 'https://avatars.githubusercontent.com/u/62848800?v=4'
        ]);
        User::factory()->create([
            'name' => 'Taynara Mendes',
            'email' => 'taynara.mendes@hotmail.com',
            'password' => bcrypt('123456'),
            'photo' => 'https://avatars.githubusercontent.com/u/62848800?v=4'
        ]);
    }
}

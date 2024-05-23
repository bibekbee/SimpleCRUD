<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Newjobs;
use App\Models\Product;
use App\Models\Stars;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Jhon Doe',
            'email' => 'jhondoe@gmail.com',
            'password' => 'pass'
        ]);
        
        Newjobs::factory(10)->create();
        Stars::factory(5)->create();
}
}

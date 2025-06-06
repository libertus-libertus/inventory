<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create([
            'name' => 'Smartphone',
            'description' => 'Smartphone'
        ]);

        Category::create([
            'name' => 'iPhone',
            'description' => 'iPhone'
        ]);

        Category::create([
            'name' => 'MacBook',
            'description' => 'MacBook'
        ]);

        Category::create([
            'name' => 'Camera',
            'description' => 'Camera'
        ]);

        Category::create([
            'name' => 'Drone',
            'description' => 'Drone'
        ]);

        Category::create([
            'name' => 'Laptop',
            'description' => 'Laptop'
        ]);

        Category::create([
            'name' => 'iPad',
            'description' => 'iPad'
        ]);

        Category::create([
            'name' => 'Printer',
            'description' => 'Printer'
        ]);
    }
}

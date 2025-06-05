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
            'description' => 'Smartphone terbaru'
        ]);

        Category::create([
            'name' => 'Laptop',
            'description' => 'Laptop terbaru'
        ]);

        Category::create([
            'name' => 'iPad',
            'description' => 'iPad terbaru'
        ]);

        Category::create([
            'name' => 'Kipas',
            'description' => 'Kipas terbaru'
        ]);
    }
}

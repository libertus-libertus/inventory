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
            'category_name' => 'Smartphone',
            'description' => 'Smartphone terbaru'
        ]);

        Category::create([
            'category_name' => 'Laptop',
            'description' => 'Laptop terbaru'
        ]);

        Category::create([
            'category_name' => 'iPad',
            'description' => 'iPad terbaru'
        ]);

        Category::create([
            'category_name' => 'Kipas',
            'description' => 'Kipas terbaru'
        ]);
    }
}

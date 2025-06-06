<?php

namespace Database\Seeders;

use App\Models\Supplier;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SupplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Supplier::create([
            'name' => 'PT. Libertus Media',
            'phone' => '081275431681',
            'address' => 'Taileleu'
        ]);

        Supplier::create([
            'name' => 'CV. Sigalai Kuleek',
            'phone' => '082275431666',
            'address' => 'Taileleu'
        ]);

        Supplier::create([
            'name' => 'PT. Uremen Simaeruk',
            'phone' => '085275431989',
            'address' => 'Taileleu'
        ]);
    }
}

<?php

namespace Database\Seeders;

use App\Models\Customer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Customer::create([
            'name' => 'Yusef Narto',
            'phone' => '081267341243',
            'address' => 'Taileleu'
        ]);

        Customer::create([
            'name' => 'Pardianto Kani',
            'phone' => '081367340091',
            'address' => 'Taileleu'
        ]);

        Customer::create([
            'name' => 'Sudar Guido',
            'phone' => '082367341195',
            'address' => 'Taileleu'
        ]);

        Customer::create([
            'name' => 'Diana Sagugurat',
            'phone' => '082367343456',
            'address' => 'Taileleu'
        ]);
    }
}

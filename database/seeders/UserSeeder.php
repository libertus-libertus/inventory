<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Administrator',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('123'),
            'role' => 'admin',
            'phone' => '081298172910',
            'address' => 'Banjir Kanal'
        ]);

        User::create([
            'name' => 'Kasir',
            'email' => 'kasir@gmail.com',
            'password' => Hash::make('123'),
            'role' => 'kasir',
            'phone' => '082198172912',
            'address' => 'Banjir Kanal No. 14C'
        ]);
    }
}

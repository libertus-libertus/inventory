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
            'name' => 'Libertus',
            'email' => 'libertus@gmail.com',
            'password' => Hash::make('123'),
            'role' => 'admin',
            'phone' => '081298172910',
            'address' => 'Padang Utara'
        ]);

        User::create([
            'name' => 'Lenawati Saleleusik',
            'email' => 'lenawati@gmail.com',
            'password' => Hash::make('123'),
            'role' => 'kasir',
            'phone' => '082398170082',
            'address' => 'Padang Kota'
        ]);

        User::create([
            'name' => 'Kasir 1',
            'email' => 'kasir1@gmail.com',
            'password' => Hash::make('123'),
            'role' => 'kasir',
            'phone' => '081398172987',
            'address' => 'Padang Timur'
        ]);

        User::create([
            'name' => 'Kasir 2',
            'email' => 'kasir2@gmail.com',
            'password' => Hash::make('123'),
            'role' => 'kasir',
            'phone' => '082398172123',
            'address' => 'Padang Barat'
        ]);

        User::create([
            'name' => 'Kasir 3',
            'email' => 'kasir3@gmail.com',
            'password' => Hash::make('123'),
            'role' => 'kasir',
            'phone' => '085298172465',
            'address' => 'Ulak Karang'
        ]);
    }
}

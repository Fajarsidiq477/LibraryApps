<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'nim' => '2010031',
            'name' => 'admin ganteng pisan',
            'email' => 'admin@upi.edu',
            'password' => bcrypt('123456'),
            'number' => '081910514970',
            'role' => 'Super Admin' //super admin
        ]);

        User::create([
            'nim' => '2082990',
            'name' => 'staff lumayan ganteng',
            'email' => 'staff@upi.edu',
            'password' => bcrypt('123456'),
            'number' => '085222622254',
            'role' => 'Admin' //admin / staff
        ]);

        User::create([
            'nim' => '2000000',
            'name' => 'anggota perpus si kutu buku',
            'email' => 'anggota@upi.edu',
            'password' => bcrypt('123456'),
            'number' => '085749875966',
            'role' => 'Member' //anggota
        ]);
    }
}

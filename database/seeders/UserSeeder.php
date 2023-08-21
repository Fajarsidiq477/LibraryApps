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
            'id' => '2010031',
            'name' => 'admin ganteng pisan',
            'email' => 'admin@upi.edu',
            'password' => bcrypt(123456),
            'phone' => '081910514970',
            'role' => '0' //super admin
        ]);

        User::create([
            'id' => '2082990',
            'name' => 'staff lumayan ganteng',
            'email' => 'staff@upi.edu',
            'password' => bcrypt(123456),
            'phone' => '085222622254',
            'role' => '1' //admin / staff
        ]);

        User::create([
            'id' => '2000000',
            'name' => 'anggota perpus si kutu buku',
            'email' => 'anggota@upi.edu',
            'password' => bcrypt(123456),
            'phone' => '085749875966',
            'role' => '2' //anggota
        ]);
    }
}

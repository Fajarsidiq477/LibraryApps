<?php

namespace Database\Seeders;

use App\Models\Lend;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class BookLendSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Lend::create([
            'user_id' => 2000000,
            'book_id' => 1,
            'lend_date' => Carbon::createFromDate('2023', '08', '10')->toDateTimeString(),
            'lend_status' => '0'
        ]);

        Lend::create([
            'user_id' => 2000000,
            'book_id' => 1,
            'lend_date' => Carbon::createFromDate('2023', '08', '17')->toDateTimeString(),
            'lend_status' => '1'
        ]);

        Lend::create([
            'user_id' => 2010031,
            'book_id' => 2,
            'lend_date' => Carbon::createFromDate('2023', '08', '17')->toDateTimeString(),
            'lend_status' => '0'
        ]);

    }
}

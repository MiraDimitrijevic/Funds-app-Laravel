<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Fund;


class FundSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Fund::truncate();
        Fund::factory()
            ->count(10000)
            ->create();
    }
}

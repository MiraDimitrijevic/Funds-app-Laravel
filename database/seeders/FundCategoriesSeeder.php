<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\FundCategories;


class FundCategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      
        FundCategories::truncate();
        FundCategories::factory()
            ->count(10)
            ->create();
    }
}

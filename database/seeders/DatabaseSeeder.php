<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
           FundCategoriesSeeder::class,
         FundSubCategoriesSeeder::class,
         FundSeeder::class,
            UserSeeder::class,
        UserFundsSeeder::class,
        ]);    }
}

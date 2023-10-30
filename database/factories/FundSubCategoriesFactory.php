<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\FundCategories;


class FundSubCategoriesFactory extends Factory
{
    static $k=0;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
       global $k;
       $fundCategoryIDs = FundCategories::all()->pluck('id')->toArray();
        return [
            'name' => 'SubCategory'. ++$k,
            'categoryID' => $this->faker->randomElement($fundCategoryIDs),
        ];
    }
}

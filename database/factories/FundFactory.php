<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\FundCategories;
use App\Models\FundSubCategories;


class FundFactory extends Factory
{
    static $idF=0;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
       global $idF;
       $fundCategoryIDs = FundCategories::all()->pluck('id')->toArray();
       $fundCategoryID = $this->faker->randomElement($fundCategoryIDs);
       $fundSubCategoryIDs = FundSubCategories::get()->where('categoryID', $fundCategoryID)->pluck('id')->toArray();
        return [
            'name' => 'Fund '. ++$idF,
            'fundCategoryID' => $fundCategoryID,
            'fundSubCategoryID' => $this->faker->randomElement($fundSubCategoryIDs),
            'ISIN' => 'ISIN00'. $idF,
            'WKN' => 'WKN00'. $idF,

            
        ];
    }
}

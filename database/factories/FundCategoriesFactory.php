<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class FundCategoriesFactory extends Factory
{
    static $i=0;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
       global $i;
        return [
            'name' => 'Category'. ++$i,
        ];
    }
}

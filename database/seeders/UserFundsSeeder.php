<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\UserFunds;
use App\Models\User;


class UserFundsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        UserFunds::truncate();
            $userIDs = User::all()->pluck('id')->toArray();
            foreach($userIDs as $userID) {
                for($ran =1; $ran<=10;$ran++){
UserFunds::create([
    'userID'=>$userID,
    'fundID'=>rand(1,10000)
]);
                }
            }
    }
}

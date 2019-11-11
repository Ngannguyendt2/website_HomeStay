<?php

use App\UserProfile;
use Illuminate\Database\Seeder;

class UserProfilesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $userProfile = new UserProfile;
        $userProfile->address = 'Ha Noi';
        $userProfile->phone = '032132323';
        $userProfile->user_id = 1;
        $userProfile->save();
    }
}

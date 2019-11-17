<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        $limit = 10;

        for ($i = 0; $i < $limit; $i++) {
            DB::table('users')->insert([
                'name' => $faker->name,
                'email' => $faker->unique()->email,
                'address' => $faker->address,
                'phone' => $faker->phoneNumber,
                'password' => $faker->password,
            ]);
        }
        $user = new User;
        $user->name = 'ngannguyen';
        $user->email = 'ngannguyendt2haui@gmail.com';
        $user->address='Ha Noi';
        $user->phone='0964543532';
        $user->password = Hash::make('123456789');
        $user->admin = '1';
        $user->save();

        $user = new User;
        $user->name = 'vinhnguyen';
        $user->email = 'vanvinhbk90hoangkim@gmail.com';
        $user->address='Ha Noi';
        $user->phone='0366112697';
        $user->password = Hash::make('123456789');
        $user->admin = '1';
        $user->save();

    }
}

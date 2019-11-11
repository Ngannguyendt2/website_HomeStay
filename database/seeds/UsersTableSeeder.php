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
        $user = new User;
        $user->name = 'ngannguyen';
        $user->email = 'ngannguyendt2haui@gmail.com';
        $user->password = Hash::make('123456789');
        $user->admin = '1';
        $user->save();

        $user = new User;
        $user->name = 'vinhnguyen';
        $user->email = 'vanvinhbk90hoangkim@gmail.com';
        $user->password = Hash::make('123456789');
        $user->admin = '1';
        $user->save();

    }
}

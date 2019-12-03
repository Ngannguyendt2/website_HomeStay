<?php


namespace App\Http\Repositories\IMPL;


use App\Customer;
use App\House;
use App\Http\Repositories\Eloquent\RepositoryEloquent;
use App\Http\Repositories\UserRepositoryInterface;
use App\User;
use Auth;
use Illuminate\Support\Facades\DB;

class UserRepository extends RepositoryEloquent implements UserRepositoryInterface
{

    public function getModel()
    {
        // TODO: Implement getModel() method.
        $user = User::class;
        return $user;
    }

    public function updatePassword($object)
    {
        // TODO: Implement updatePassword() method.
        $object->save();
    }

    public function getUserByHouse($houseId)
    {
        // TODO: Implement getUserByHouse() method.
        $house = House::find($houseId);
        return $house->user;
    }

    public function getUserByCustomer($customerId)
    {
        // TODO: Implement getUserByCustomer() method.
        $customer = Customer::find($customerId);
        return $customer->user;
    }

    public function historyRentHouse()
    {
        // TODO: Implement historyRentHouse() method.
        $user = Auth::user();
        $customer = $user->customer()->first();
        return $customer->orders;
    }

    public function getMonthlyIncome($startDate, $endDate)
    {
        // TODO: Implement getMonthlyIncome() method.

        $money = DB::table('users')->join('houses', 'users.id', '=', 'houses.user_id')
            ->join('orders', 'houses.id', '=', 'orders.house_id')
            ->where('orders.checkin', '<=', $endDate)
            ->where('orders.checkout', '>=', $startDate)
            ->where('orders.checkout', '<=', $endDate)
            ->where('users.id', '=', Auth::user()->id)
            ->sum('orders.totalPrice');
        return $money;
    }
}

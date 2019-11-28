<?php


namespace App\Http\Repositories\IMPL;


use App\Customer;
use App\House;
use App\Http\Repositories\Eloquent\RepositoryEloquent;
use App\Http\Repositories\UserRepositoryInterface;
use App\User;

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
        $customer=Customer::find($customerId);
        return $customer->user;
    }
}

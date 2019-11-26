<?php


namespace App\Http\Repositories\IMPL;


use App\Customer;
use App\Http\Repositories\CustomerRepositoryInterface;
use App\Http\Repositories\Eloquent\RepositoryEloquent;

class CustomerRepository extends RepositoryEloquent implements CustomerRepositoryInterface
{


    public function getModel()
    {
        // TODO: Implement getModel() method.
        $customer = Customer::class;
        return $customer;
    }

}

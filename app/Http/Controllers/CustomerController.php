<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Http\Requests\CreateFormOrder;
use App\Http\Services\CustomerServiceInterface;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    //
    protected $customer;

    public function __construct(CustomerServiceInterface $customerService)
    {
        $this->customer = $customerService;
    }

    public function order(CreateFormOrder $request, $id)
    {

    }

}

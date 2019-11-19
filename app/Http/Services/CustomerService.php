<?php


namespace App\Http\Services;


use App\Customer;
use App\Http\Repositories\CustomerRepositoryInterface;
use App\Http\Repositories\OrderRepositoryInterface;
use App\Order;

class CustomerService implements CustomerServiceInterface
{
    protected $customerRepo;
    protected $orderRepo;

    public function __construct(CustomerRepositoryInterface $customerRepo, OrderRepositoryInterface $orderRepo)
    {
        $this->customerRepo = $customerRepo;
        $this->orderRepo = $orderRepo;

    }

    public function create($request)
    {
        // TODO: Implement create() method.
        $customer = new Customer;
        $customer->name = $request->name;
        $customer->email = $request->email;
        $customer->phone = $request->phone;
        $this->customerRepo->create($customer);
    }

    public function order($request)
    {
        // TODO: Implement order() method.
        $order = new Order;
        $order->checkin = $request->checkin;
        $order->checkout = $request->checkout;
        $this->orderRepo->create($order);
    }
}

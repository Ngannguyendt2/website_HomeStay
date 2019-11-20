<?php


namespace App\Http\Services;


use App\Customer;
use App\House;
use App\Http\Repositories\CustomerRepositoryInterface;
use App\Http\Repositories\OrderRepositoryInterface;
use App\Order;
use Carbon\Carbon;

class OrderService implements OrderServiceInterface
{
    protected $orderRepo;
    protected $customer;

    public function __construct(OrderRepositoryInterface $orderRepo, CustomerRepositoryInterface $customer)
    {
        $this->orderRepo = $orderRepo;
        $this->customer = $customer;
    }

    public function create($request, $houseId)
    {
        // TODO: Implement order() method.
        $order = new Order();
        $order->checkin = $this->getDateCheckin($request);
        $order->checkout = $this->getDateCheckout($request);
        $order->totalPrice = $this->getPriceHouse($request, $houseId);
        $order->house_id = $houseId;
        if (!$this->checkEmailCustomer($request)) {
            $customer = new Customer;
            $customer->name = $request->name;
            $customer->email = $request->email;
            $customer->phone = $request->phone;
            $this->customer->create($customer);

            $order->customer_id = $customer->id;
        } else {
            $customers = $this->customer->getAll();
            foreach ($customers as $customer) {
                if ($customer->email == $request->email) {
                    $order->customer_id = $customer->id;
                }
            }
        }
        $this->orderRepo->create($order);
    }

    public function checkEmailCustomer($request)
    {
        $customers = $this->customer->getAll();
        foreach ($customers as $customer) {
            if (($request->email == $customer->email) &&($request->phone==$customer->phone)) {
                return true;
            }
        }
        return false;
    }

    public function getDateOrder($request)
    {
        return $this->getDateCheckout($request)->diffInDays($this->getDateCheckin($request));
    }

    public function getDateCheckin($request)
    {
        return Carbon::create($request->checkin);
    }

    public function getDateCheckout($request)
    {
        return Carbon::create($request->checkout);
    }

    public function getPriceHouse($request, $houseId)
    {
        $house = House::find($houseId);
        return $this->getDateOrder($request) * $house->price;
    }
}

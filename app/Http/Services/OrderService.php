<?php


namespace App\Http\Services;


use App\Customer;
use App\House;
use App\Http\Repositories\CustomerRepositoryInterface;
use App\Http\Repositories\OrderRepositoryInterface;
use App\Order;
use App\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

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
        $order->checkin = $this->getDateCheckinFromForm($request);
        $order->checkout = $this->getDateCheckoutFromForm($request);
        $order->totalPrice = $this->getPriceHouse($request, $houseId);
        $order->house_id = $houseId;
       $order->customer_id=$this->checkEmailCustomer($request)->id ;
        $this->orderRepo->create($order);

    }

    public function findById($id)
    {
        // TODO: Implement findById() method.
        return $this->orderRepo->getById($id);
    }

    public function destroy($id)
    {
        $order = $this->findById($id);
        $this->orderRepo->destroy($order);
    }

    public function checkEmailCustomer($request)
    {
        $customers = $this->customer->getAll();
        foreach ($customers as $customer) {
            if (Auth::user()->phone!=null ) {
                if ($customer->user_id==Auth::user()->id){
                    return $customer;
                }

            } else {
                $customer = new Customer;
                $customer->name = Auth::user()->name;
                $customer->email = Auth::user()->email;
                $customer->phone = $request->phone;
                $customer->user_id = Auth::user()->id;
                $this->customer->create($customer);
                $user = User::find(Auth::user()->id);
                $user->phone = $request->phone;
                $user->save();
                return $customer;
            }
        }

    }

    public function getDateOrder($request)
    {
        return $this->getDateCheckoutFromForm($request)->diffInDays($this->getDateCheckinFromForm($request));
    }

    public function getDateCheckinFromForm($request)
    {
        return Carbon::create($request->checkin);
    }

    public function getDateCheckoutFromForm($request)
    {
        return Carbon::create($request->checkout);
    }

    public function getPriceHouse($request, $houseId)
    {
        $house = House::find($houseId);
        return $this->getDateOrder($request) * $house->price;
    }


    public function checkDate($request, $houseId)
    {
        $orders = $this->orderRepo->checkDate($this->getDateCheckinFromForm($request), $this->getDateCheckoutFromForm($request), $houseId);
        foreach ($orders as $order) {
            if ($order) {
                return true;

            }
            return false;
        }

    }

    public function getOrderByHouse($houseId)
    {
        // TODO: Implement getOrderByHouse() method.
        return $this->orderRepo->getOrderByHouse($houseId);
    }
}

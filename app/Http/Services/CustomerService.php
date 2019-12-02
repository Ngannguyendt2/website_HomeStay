<?php


namespace App\Http\Services;


use App\Customer;
use App\Http\Repositories\CustomerRepositoryInterface;
use App\Http\Repositories\OrderRepositoryInterface;
use App\Order;
use Carbon\Carbon;

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

    public function destroyOrder($orderId)
    {
        $order = $this->orderRepo->getById($orderId);
        $orderCheckin = Carbon::create($order->checkin);
        $now = new Carbon();
        if (($now->diffInDays($orderCheckin)) <= 1) {
            $message = 'Bạn không thể hủy trong 1 ngày trước thời gian thuê';
            session()->flash('error',$message);
        } else {
            $this->orderRepo->destroy($order);

            $error = 'Bạn đã hủy thuê nhà thành công ';
            session()->flash('success',$error);
        }

    }

    public function getById($id)
    {
        return $this->customerRepo->getById($id);
    }

}

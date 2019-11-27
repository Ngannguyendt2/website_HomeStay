<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Http\Requests\CreateFormOrder;
use App\Http\Services\CustomerServiceInterface;
use App\Http\Services\UserServiceInterface;
use App\Notifications\YouHasNewEmail;
use App\Order;
use Auth;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    //
    protected $customer;
    protected $user;

    public function __construct(CustomerServiceInterface $customerService, UserServiceInterface $user)
    {
        $this->customer = $customerService;
        $this->user = $user;
    }

    public function destroyOrder($orderId)
    {
        $order = Order::find($orderId);
        $this->customer->destroyOrder($orderId);
        $this->sendNotificationCancelOrder($order->house_id);
        return redirect()->route('house.houseDetail', ['id' => Auth::user()->id]);
    }

    public function sendNotificationCancelOrder($houseId)
    {
        $user = $this->user->getUserByHouse($houseId);

        $details = [
            'greeting' => 'Hi House Owner',
            'body' => 'Your order has been cancel from websiteHomestay.com',
            'thanks' => 'Thank you for using websiteHomestay.com tuto!',
            'actionText' => 'View My Site',
            'actionURL' => url('/'),
            'order_id' => 101
        ];

        $user->notify(new YouHasNewEmail($details));
    }
}

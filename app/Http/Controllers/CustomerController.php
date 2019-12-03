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

    public function destroyOrder($orderId,Request $request)
    {
        $order = Order::find($orderId);
        $this->customer->destroyOrder($orderId);
        $reasons = $request->reasons;
        foreach ($reasons as $reason) {
            if ($reason != null) {
                $this->sendNotificationCancelOrder($order->house_id,$reason);
            }
        }

        return response()->json([
            'status'=>'success',
            'message'=>'Bạn đã hủy thuê nhà '
        ]);
    }

    public function sendNotificationCancelOrder($houseId,$message)
    {
        $user = $this->user->getUserByHouse($houseId);

        $details = [
            'greeting' => 'Hi House Owner',
            'body' => $message,
            'thanks' => 'Thank you for using websiteHomestay.com tuto!',
            'actionText' => 'View My Site',
            'actionURL' => url('/'),
            'order_id' => 101
        ];
        $when = now()->addSeconds(10);
        $user->notify((new YouHasNewEmail($details))->delay($when));
    }
}

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

    public function destroyOrder($orderId, Request $request)
    {
        $order = Order::find($orderId);
        $this->customer->destroyOrder($orderId);
        $reasons = $request->reasons;
        foreach ($reasons as $reason) {
            if ($reason != null) {
                $this->sendNotificationCancelOrder($order->house_id, $reason);
            }
        }

        return response()->json([
            'status' => 'success',
            'message' => 'Bạn đã hủy thuê nhà '
        ]);
    }

    public function sendNotificationCancelOrder($houseId, $message)
    {
        $user = $this->user->getUserByHouse($houseId);
        $customer = Auth::user()->name;
        $details = [
            'greeting' => 'Xin chào ' . $user->name,
            'body' => 'Đơn hàng từ '.$customer.' đã bị hủy với lý do ' . $message,
            'thanks' => 'Cảm ơn bạn đã tin tưởng và lựa chọn chúng tôi!',
            'actionText' => 'Xem chi tiết ',
            'actionURL' => url('/'),
            'order_id' => 101
        ];
        $when = now()->addSeconds(10);
        $user->notify((new YouHasNewEmail($details))->delay($when));
    }
}

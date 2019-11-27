<?php

namespace App\Http\Controllers;

use App\Customer;
use App\House;
use App\Http\Requests\CreateFormOrder;
use App\Http\Services\OrderServiceInterface;
use App\Http\Services\UserServiceInterface;
use App\Notifications\YouHasNewEmail;
use Illuminate\Notifications\Notification;
use App\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    //
    protected $order;
    protected $user;

    public function __construct(OrderServiceInterface $order, UserServiceInterface $user)
    {
        $this->order = $order;
        $this->user = $user;
    }

    public function order(CreateFormOrder $request, $id)
    {
        try {
            if (!$this->order->checkDate($request, $id)) {
                $this->order->create($request, $id);
                $this->sendNotificationNewOrder($id);
                return response()->json([
                    'status' => 'success',
                    'message' => 'order thành công'
                ]);
            } else {

                return response()->json([
                    'status' => 'errors',
                    'message' => 'lịch bạn đặt đã bị trùng '
                ]);
            }
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'errors',
                'message' => $e->getMessage()
            ]);
        }
    }

    public function delete($orderId)
    {
        $order=$this->order->findById($orderId);
        $this->order->destroy($orderId);
        $this->sendNotificationCancelOrder($order->customer_id);
        return redirect()->back()->withMessage('Đã xóa khách hàng thành công');
    }

    public function checkApprove($orderId)
    {
        $order = $this->order->findById($orderId);
        $this->sendNotificationConfirmOrder($order->customer_id);
        $order->update(['approved_at' => now()]);
        return redirect()->route('houses.customer.approve', $order->house->id)->withMessage('Đã thêm khách hàng thành công');
    }

    public function approve($id)
    {

        $house = House::find($id);
        $orders = Order::whereNull('approved_at')->where('house_id', $id)->paginate(10);
        return view('user.housesManager.detailCustomer', compact('orders', 'house'));
    }

    public function sendNotificationNewOrder($houseId)
    {
        $user = $this->user->getUserByHouse($houseId);

        $details = [
            'greeting' => 'Hi House Owner',
            'body' => 'You has new order from websiteHomestay.com',
            'thanks' => 'Thank you for using websiteHomestay.com tuto!',
            'actionText' => 'View My Site',
            'actionURL' => url('/'),
            'order_id' => 101
        ];

        $user->notify(new YouHasNewEmail($details));
    }

    public function sendNotificationConfirmOrder($customerId)
    {
        $user = $this->user->getUserByCustomer($customerId);

        $details = [
            'greeting' => 'Hi Customer',
            'body' => 'Your order has been confirmed from websiteHomestay.com',
            'thanks' => 'Thank you for using websiteHomestay.com tuto!',
            'actionText' => 'View My Site',
            'actionURL' => url('/'),
            'order_id' => 101
        ];

        $user->notify(new YouHasNewEmail($details));
    }

    public function sendNotificationCancelOrder($customerId)
    {
        $user = $this->user->getUserByCustomer($customerId);
        $details = [
            'greeting' => 'Hi Customer',
            'body' => 'Your order has been cancel from websiteHomestay.com',
            'thanks' => 'Thank you for using websiteHomestay.com tuto!',
            'actionText' => 'View My Site',
            'actionURL' => url('/'),
            'order_id' => 101
        ];

        $user->notify(new YouHasNewEmail($details));
    }
}

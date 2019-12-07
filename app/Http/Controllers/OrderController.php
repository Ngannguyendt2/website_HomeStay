<?php

namespace App\Http\Controllers;

use App\House;
use App\Http\Requests\CreateFormOrder;
use App\Http\Services\HouseServiceInterface;
use App\Http\Services\OrderServiceInterface;
use App\Http\Services\UserServiceInterface;
use App\Notifications\OrderHouse;
use App\Notifications\YouHasNewEmail;

use App\User;
use Illuminate\Notifications\Notification;
use App\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    protected $order;
    protected $user;
    protected $house;

    public function __construct(OrderServiceInterface $order,
                                UserServiceInterface $user,
                                HouseServiceInterface $houseService)
    {
        $this->order = $order;
        $this->user = $user;
        $this->house = $houseService;
    }

    public function order(CreateFormOrder $request, $id)
    {

        try {

            if (!$this->order->checkDate($request, $id)) {

                $this->order->create($request, $id);
                $this->sendNotificationNewOrder($id);
                return response()->json([
                    'status' => 'success',
                    'message' => 'đặt lịch thành công'
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

    public function delete($orderId, Request $request)
    {
        $order = $this->order->findById($orderId);
        $this->order->destroy($orderId);
        $reasons = $request->reasons;
        foreach ($reasons as $reason) {
            if ($reason != null) {
                $this->sendNotificationCancelOrder($order->customer_id, $reason);
            }
        }

        return response()->json([
            'status' => 'success',
            'message' => 'hủy thành công'
        ]);
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
        $house = $this->house->getHouseById($id);
        $orders = Order::whereNull('approved_at')->where('house_id', $id)->paginate(10);
        return view('user.housesManager.detailCustomer', compact('orders', 'house'));
    }

    public function myCustomer($id)
    {
        $orders = Order::whereNotNull('approved_at')->where('checkin', '>', now())->paginate(10);
        return view('user.housesManager.myCustomer', compact('orders'));
    }

    public function sendNotificationNewOrder($houseId)
    {
        $house = $this->house->getHouseById($houseId);
        $houseOwner_id = $house->user_id;
        $houseOwner = $this->user->getUserById($houseOwner_id);
        $customer = Auth::user();
        $details = [
            'greeting' => 'Hi House Owner',
            'body' => 'You has new order from websiteHomestay.com',
            'thanks' => 'Thank you for using websiteHomestay.com tuto!',
            'actionText' => 'View My Site',
            'actionURL' => url('/'),
            'house' => House::where('id', $houseId)->get()[0]->category->name,
            'price' => House::where('id', $houseId)->get()[0]->price,
            'customer' => $customer->name
        ];
        $when = now()->addSeconds(5);
        $houseOwner->notify((new YouHasNewEmail($details))->delay($when));
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
            'user' => $user->name
        ];
        $when = now()->addSeconds(5);
        $user->notify((new YouHasNewEmail($details))->delay($when));
    }

    public function sendNotificationCancelOrder($customerId, $message)
    {
        $user = $this->user->getUserByCustomer($customerId);
        $details = [
            'greeting' => 'Hi Customer',
            'body' => $message,
            'thanks' => 'Thank you for using websiteHomestay.com tuto!',
            'actionText' => 'View My Site',
            'actionURL' => url('/'),
            'user' => $user->name
        ];
        $when = now()->addSeconds(5);
        $user->notify((new YouHasNewEmail($details))->delay($when));
    }

    public function getOrderHadCancel()
    {

        try {
            $orders = $this->order->getOrderHadCancel();
            foreach ($orders as $order) {
                $order->house->category;
                $order->house->district;
                $order->house->ward;
                $order->house->province;
            }
            return response()->json([
                'status' => 'success',
                'message' => 'thành công',
                'data' => $orders
            ]);

        } catch (\Exception $exception) {
            return response()->json([
                'status' => 'error',
                'message' => 'lỗi rồi ',
                'data' => $exception->getCode()
            ]);
        }

    }

    public function sendNotification($houseId)
    {
        $house = $this->house->getHouseById($houseId);
        $houseOwner_id = $house->user_id;
        $houseOwner = $this->user->getUserById($houseOwner_id);
        $customer = Auth::user();
        $houseOwner->notify(new OrderHouse($house, $customer));


    }
}

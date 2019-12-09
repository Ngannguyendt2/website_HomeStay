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
use Auth;
use Illuminate\Notifications\Notification;
use App\Order;
use Illuminate\Http\Request;


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
        $user = $this->user->getUserByHouse($houseId);
        $house = $this->house->getHouseById($houseId);
        $houseOwner_id = $house->user_id;
        $houseOwner = $this->user->getUserById($houseOwner_id);
        $customer = Auth::user();
        $details = [
            'greeting' => 'Xin chào ' . $user->name,
            'body' => 'Bạn có đơn hàng mới từ ' . $customer->name,
            'thanks' => 'Cảm ơn bạn đã tin tưởng và lựa chọn chúng tôi!',
            'actionText' => 'Xem chi tiết ',
            'actionURL' => url('/'),
            'house' => House::where('id', $houseId)->get()[0]->category->name,
            'price' => House::where('id', $houseId)->get()[0]->price,
//            'user' => $user->name
            'customer' => $customer->name
        ];
        $when = now()->addSeconds(5);
        $houseOwner->notify((new YouHasNewEmail($details))->delay($when));
    }

    public function sendNotificationConfirmOrder($customerId)
    {
        $customer = $this->user->getUserByCustomer($customerId);
        $user = Auth::user()->name;
        $details = [
            'greeting' => 'Xin chào ' . $customer->name,
            'body' => 'Đơn hàng của bạn đã được chủ nhà ' . $user . 'xác nhận ',
            'thanks' => 'Cảm ơn bạn đã tin tưởng và lựa chọn sự giới thiệu từ chúng tôi! ',
            'actionText' => 'Xem chi tiết ',
            'actionURL' => url('/'),
            'user' => $customer->name
        ];
        $when = now()->addSeconds(5);
        $customer->notify((new YouHasNewEmail($details))->delay($when));
    }

    public function sendNotificationCancelOrder($customerId, $message)
    {
        $customer = $this->user->getUserByCustomer($customerId);
        $user = Auth::user()->name;
        $details = [
            'greeting' => 'Xin chào ' . $customer->name,
            'body' => 'Đơn hàng của bạn đã bị chủ nhà ' . $user . ' hủy với lý do ' . $message,
            'thanks' => 'Cảm ơn bạn đã tin tưởng và lựa chọn sự giới thiệu từ chúng tôi!',
            'actionText' => 'Xem chi tiết ',
            'actionURL' => url('/'),
            'user' => $customer->name
        ];
        $when = now()->addSeconds(5);
        $customer->notify((new YouHasNewEmail($details))->delay($when));
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

    public function deleteOrderSoftDelete($id)
    {

        $this->order->deleteOrderSoftDelete($id);
       return redirect()->route('user.profile');
    }
}

<?php

namespace App\Http\Controllers;

use App\Customer;
use App\House;
use App\Http\Requests\CreateFormOrder;
use App\Http\Services\OrderServiceInterface;
use App\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    //
    protected $order;

    public function __construct(OrderServiceInterface $order)
    {
        $this->order = $order;
    }

    public function order(CreateFormOrder $request, $id)
    {
        try {
            $this->order->create($request, $id);
            return response()->json([
                'status' => 'success',
                'message' => 'Order thành công'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'errors',
                'message' => $e->getMessage()
            ]);
        }
    }

    public function delete($id)
    {
        $this->order->destroy($id);
        return redirect()->back()->withMessage('Đã xóa khách hàng thành công');
    }

    public function checkApprove($id)
    {
        $order = $this->order->findById($id);
        $order->update(['approved_at' => now()]);
        return redirect()->route('houses.customer.approve', $order->house->id)->withMessage('Đã thêm khách hàng thành công');
    }

    public function approve($id)
    {
        $house = House::find($id);
        $orders = Order::whereNull('approved_at')->where('house_id', $id)->paginate(10);
        return view('user.housesManager.detailCustomer', compact('orders', 'house'));
    }
}

<?php


namespace App\Http\Repositories\IMPL;


use App\Http\Repositories\Eloquent\RepositoryEloquent;
use App\Http\Repositories\OrderRepositoryInterface;
use App\Order;
use Auth;
use Illuminate\Support\Facades\DB;

class OrderRepository extends RepositoryEloquent implements OrderRepositoryInterface
{

    public function getModel()
    {
        // TODO: Implement getModel() method.
        $order = Order::class;
        return $order;
    }

    public function checkDate($checkin, $checkout, $houseId)
    {
        // TODO: Implement checkDate() method.
        return Order::where([['checkin', '<=', $checkout], ['checkout', '>=', $checkin], ['house_id', '=', $houseId]])->get();
    }

    public function getOrderByHouse($houseId)
    {
        // TODO: Implement getOrderByHouse() method.
        return Order::where('houseId', '=', $houseId)->get();
    }

    public function getOrderByUser($startDate, $endDate)
    {
        // TODO: Implement getOrderByUser() method.
        $orders = DB::table('users')->join('houses', 'users.id', '=', 'houses.user_id')
            ->join('orders', 'houses.id', '=', 'orders.house_id')
            ->where('orders.checkin', '<=', $endDate)
            ->where('orders.checkout', '>=', $startDate)
            ->where('orders.checkout', '<=', $endDate)
            ->where('users.id', '=', Auth::user()->id)->orderBy('orders.checkout','asc')->get();
        return $orders;
    }
}

<?php


namespace App\Http\Repositories\IMPL;


use App\Http\Repositories\Eloquent\RepositoryEloquent;
use App\Http\Repositories\OrderRepositoryInterface;
use App\Order;

class OrderRepository extends RepositoryEloquent implements OrderRepositoryInterface
{

    public function getModel()
    {
        // TODO: Implement getModel() method.
        $order = Order::class;
        return $order;
    }

    public function checkDate($checkin, $checkout,$houseId)
    {
        // TODO: Implement checkDate() method.
        return Order::where([['checkin','<=',$checkout],['checkout','>',$checkin],['house_id','=',$houseId]])->get();
    }

    public function getOrderByHouse($houseId)
    {
        // TODO: Implement getOrderByHouse() method.
        return Order::where('houseId','=',$houseId)->get();
    }
}

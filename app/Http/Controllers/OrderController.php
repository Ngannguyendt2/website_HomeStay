<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateFormOrder;
use App\Http\Services\OrderServiceInterface;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    //
    protected $order;
    public function __construct(OrderServiceInterface $order)
    {
        $this->order=$order;
    }
    public function order(CreateFormOrder $request,$id){
        try{
            $this->order->create($request,$id);
            return response()->json([
                'status' => 'success',
                'message' => 'order thành công'
            ]);
        }
        catch (\Exception $e){
            return response()->json([
                'status' => 'errors',
                'message' => 'lỗi order'
            ]);
        }
    }
}

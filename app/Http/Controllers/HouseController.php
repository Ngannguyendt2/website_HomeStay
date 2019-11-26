<?php

namespace App\Http\Controllers;

use App\Customer;
use App\House;
use App\Http\Requests\CreateHouseRequest;
use App\Http\Services\HouseServiceInterface;
use App\Order;
use App\Province;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use willvincent\Rateable\Rating;

class HouseController extends Controller
{

    protected $house;

    public function __construct(HouseServiceInterface $house)
    {
        $this->house = $house;
    }

    public function index()
    {
        $houses = $this->house->getAll();
        return view('admin.houses.list', compact('houses'));
    }

    public function approve()
    {
        $houses = House::whereNull('approved_at')->paginate(4);
        return view('admin.houses.approve', compact('houses'));
    }

    public function create()
    {
        $categories = $this->house->getCategoryHouse();
        $provinces = Province::all();
        return view('houses.create', compact('categories', 'provinces'));
    }

    public function store(CreateHouseRequest $request)
    {
        $this->house->create($request);
        Session::flash('success', 'Đã đăng bài thành công ... Xin vui lòng chờ admin kiểm duyệt');
        return redirect()->route('house.create');
    }

    public function housesManager($id)
    {
        $houses = House::where('user_id', $id)->paginate(4);
        return view('user.housesManager.list', compact('houses'));
    }

    public function detailCustomer($id)
    {
        $customers = $this->house->getHouseById($id)->customers;
        $orders = Order::where('house_id', $id)->get();
        return view('user.housesManager.detailCustomer', compact('customers', 'orders'));
    }

    public function checkApprove($id)
    {
        $house = $this->house->getHouseById($id);
        $house->update(['approved_at' => now()]);
        return redirect()->route('admin.houses.approve')->withMessage('Nhà đã xác nhận được phép đăng');
    }

    public function getHouseById($id)
    {
        $house = $this->house->getHouseById($id);
        $posts = $house->posts()->get();

        $ratings = [];
        foreach ($posts as $post) {
            array_push($ratings, $post->ratings()->get()->toArray());
        }
//        dd($ratings);

        return view('web.detail', compact('house', 'posts'));
    }

    public function search(Request $request)
    {
        return response()->json($request);
    }

    public function houseDetail($id)
    {
        $customers=Customer::where('user_id',$id)->get();
        $customerId=$customers[0]->id;
        $orders = Order::where('customer_id', $customerId)->get();
        return view('user.houseDetail', compact('orders'));
    }
}

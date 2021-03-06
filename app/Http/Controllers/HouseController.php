<?php

namespace App\Http\Controllers;

use App\Customer;
use App\House;
use App\Http\Requests\CreateHouseRequest;
use App\Http\Services\HouseServiceInterface;
use App\Order;
use App\Post;
use App\Province;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

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

    public function housesManager()
    {
        foreach (\Illuminate\Support\Facades\Auth::user()->notifications as $notification) {
            $notification->markAsRead();
        }

        $id = Auth::user()->id;
        $houseOwner = House::where('user_id', $id)->paginate(5);
        $array = [];
        $orders = Order::where('deleted_at',null)->get();
        return view('user.housesManager.list', compact('houseOwner', 'orders', 'array'));
    }

    public function checkApprove($id)
    {
        $house = $this->house->getHouseById($id);
        $house->update(['approved_at' => now()]);
        return redirect()->route('admin.houses.approve')->withMessage('Nhà đã xác nhận được phép đăng');
    }

    public function getHouseById($id, $category_id)
    {
        $house = $this->house->getHouseById($id);
        $categories = House::where('category_id', $category_id)->limit(3)->get();
        $posts = $house->posts()->get();

        return view('web.detail', compact('house', 'posts', 'categories'));

    }

    public function search(Request $request)
    {
        $items = $this->house->search($request);
        foreach ($items as $item) {
            foreach (House::all() as $house) {
                if ($house->province_id == $item->province_id
                    && $house->district_id == $item->district_id
                    && $house->ward_id == $item->ward_id
                    && $house->category_id == $item->category_id) {
                    $item->province_id = $house->province->name;
                    $item->district_id = $house->district->name;
                    $item->ward_id = $house->ward->name;
                    $item->category = $house->category->name;

                }
            }

        }
        return response()->json($items);
    }

    public function houseDetail($id)
    {
        $customers = Customer::where('user_id', $id)->get();
        $customerId = $customers[0]->id;
        $orders = Order::where('customer_id', $customerId)->get();
        return view('user.houseDetail', compact('orders'));
    }

    public function changeStatus(Request $request, $id)
    {
        $house = $this->house->getHouseById($id);
        $status = $request->status;
        $house->status = $status;
        $house->save();
        return back();
    }
}

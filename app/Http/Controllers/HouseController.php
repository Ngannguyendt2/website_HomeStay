<?php

namespace App\Http\Controllers;

use App\House;
use App\Http\Requests\CreateHouseRequest;
use App\Http\Services\HouseServicceInterface;
use App\Province;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HouseController extends Controller
{

    protected $house;

    public function __construct(HouseServicceInterface $house)
    {
        $this->house = $house;
    }

    public function index() {
        $houses = House::all();
        return view('admin.houses.index', compact('houses'));
    }

    public function approve() {
        $houses = House::whereNull('approved_at')->paginate(4);
        return view('admin.houses.approve', compact('houses'));
    }

    public function create()
    {
        $categories = $this->house->getCategoryHouse();
        $provinces = Province::all();
        return view('houses.create', compact('categories', 'provinces'));
    }

    public function store(Request $request)
    {
        $this->house->create($request);
        return redirect()->route('web.index');
    }

    public function housesManager($id) {
        $houses = House::where('user_id', $id)->paginate(4);
        return view('user.housesManager.list', compact('houses'));
    }

    public function checkApprove($id) {
        $house = House::findOrFail($id);
        $house->update(['approved_at' => now()]);
        return redirect()->route('admin.houses.approve')->withMessage('Nhà đã xác nhận được phép đăng');
    }


}

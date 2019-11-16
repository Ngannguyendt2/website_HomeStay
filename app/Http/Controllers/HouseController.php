<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateHouseRequest;
use App\Http\Services\HouseServicceInterface;
use App\Province;
use Illuminate\Http\Request;

class HouseController extends Controller
{
    //
    protected $house;

    public function __construct(HouseServicceInterface $house)
    {
        $this->house = $house;
    }

    public function create()
    {
        $categories=$this->house->getCategoryHouse();
        $provinces = Province::all();
        return view('houses.create',compact('categories', 'provinces'));
    }

    public function store(CreateHouseRequest $request)
    {
        $this->house->create($request);
        return redirect()->route('web.index');
    }
}

<?php

namespace App\Http\Controllers;

use App\District;
use Illuminate\Http\Request;

class DistrictApiController extends Controller
{
    public function findById($id) {
        $district = District::where('id', $id)->first();
        return response()->json($district->wards);
    }

    public function index() {
        $districts = District::all();
        return response()->json($districts);
    }
}

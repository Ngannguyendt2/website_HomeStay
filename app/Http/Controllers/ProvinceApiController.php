<?php

namespace App\Http\Controllers;

use App\Province;
use Illuminate\Http\Request;

class ProvinceApiController extends Controller
{
    public function findById($id) {
        $province = Province::where('id', $id)->first();
        return response()->json($province->districts);
    }

}

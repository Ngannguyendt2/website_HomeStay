<?php

namespace App\Http\Controllers;

use App\Ward;
use Illuminate\Http\Request;

class WardApiController extends Controller
{
    public function findById($id) {
        $ward = Ward::where('id', $id)->get();
        return response()->json($ward);
    }
}

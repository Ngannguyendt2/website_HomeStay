<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeStayController extends Controller
{
    public function index()
    {
        return view('web.index');
    }


    public function comingSoon()
    {
        return view('web.comingSoon');
    }

}

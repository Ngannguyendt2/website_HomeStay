<?php

namespace App\Http\Controllers;


use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class HomeStayController extends Controller
{

    public function index()
    {
        $houses = \App\House::paginate(4);
        return view('web.index', compact('houses'));
    }


    public function comingSoon()
    {
        return view('web.comingSoon');
    }


    public function profileUser($id) {
        $user = User::findOrFail($id);
        return view('user.profile', compact('user'));
    }

    public function category() {
        return view('web.category');
    }

    public function aboutUs() {
        return view('web.about_us');
    }

    public function contact() {
        return view('web.contact');
    }

    public function detail() {
        return view('web.detail');
    }

    public function waiting() {
        return view('web.waiting');
    }


}

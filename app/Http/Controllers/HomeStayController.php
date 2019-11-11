<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class HomeStayController extends Controller
{

    public function index() {
        return view('web.index');
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
}

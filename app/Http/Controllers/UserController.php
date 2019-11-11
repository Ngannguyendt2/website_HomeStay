<?php

namespace App\Http\Controllers;

use App\Http\Services\UserServiceInterface;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    protected $profileService;

    public function __construct(UserServiceInterface $profileService)
    {
        $this->profileService = $profileService;
    }

    public function index($id)
    {
        $user = $this->profileService->getUserById($id);
        return view('user.profile', compact('user'));

    }

}

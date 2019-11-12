<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateUserRequest;
use App\Http\Services\UserServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


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

    public function update($id, UpdateUserRequest $request)
    {
        try {
            $user = $this->profileService->getUserById($id);
            $this->profileService->update($user, $request);
            $message = 'Cap nhat thanh cong';
            $request->session()->flash('success', $message);
        } catch (\Exception $exception) {
            return $exception->getMessage();
        }
        return redirect()->back();
    }

}

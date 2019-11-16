<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdatePasswordRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Services\UserServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
    public function edit($id)
    {
        $user = $this->profileService->getUserById($id);
        return view('user.update', compact('user'));
    }

    public function update($id, UpdateUserRequest $request)
    {
        try {
            $user = $this->profileService->getUserById($id);
            $this->profileService->update($user, $request);
            $message = 'Cập nhật thành công';
            $request->session()->flash('success', $message);
        } catch (\Exception $exception) {
            $error = "Cập nhật thất bại";
            $request->session()->flash('error', $error);
            return $exception->getMessage();
        }
        return redirect()->route('user.profile', $user->id);
    }

    public function updatePassword($id, Request $request) {
        try {
            $user = $this->profileService->getUserById($id);
            $this->profileService->updatePassword($user, $request);
            $message = 'Cập nhật mật khẩu thành công';
            $request->session()->flash('password_ok', $message);
        } catch (\Exception $exception) {
            return $exception->getMessage();
        }
        return redirect()->back();
    }

    public function admin() {
        return view('admin.index');
    }

}

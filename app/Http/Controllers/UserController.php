<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdatePasswordRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Services\UserServiceInterface;
use App\User;
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
    public function index(){
        $users = User::all();
        return view('admin.users.list', compact('users'));
    }

    public function getById($id)
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

    public function changePassword($id, UpdatePasswordRequest $request)
    {
        $user = $this->profileService->getUserById($id);
        return $this->profileService->updatePassword($user, $request);
    }

    public function admin() {
        return view('admin.index');
    }

    public function test() {
        return view('home');
    }

}

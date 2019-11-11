<?php

namespace App\Http\Controllers;

use App\Http\Services\UserProfileServiceInterface;
use Illuminate\Http\Request;

class UserProfileController extends Controller
{
    //
    protected $profileService;

    public function __construct(UserProfileServiceInterface $profileService)
    {
        $this->profileService = $profileService;
    }

    public function index($id)
    {
        $userProfiles = $this->profileService->getAll();
        $userProfile = $this->profileService->getUserById($id);

    }

}

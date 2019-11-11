<?php


namespace App\Http\Repositories\IMPL;


use App\Http\Repositories\Eloquent\RepositoryEloquent;
use App\Http\Repositories\UserProfileRepositoryInterface;
use App\User;
use App\UserProfile;

class UserProfileRepositoryRepository extends RepositoryEloquent implements UserProfileRepositoryInterface
{

    public function getModel()
    {
        // TODO: Implement getModel() method.
        $profile = UserProfile::class;
        return $profile;
    }


    public function getUserById($id)
    {
        // TODO: Implement getUserById() method.
        $userProfile = $this->getUserProfileById($id);
        return $userProfile->user;
    }
}

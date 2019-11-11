<?php


namespace App\Http\Repositories\IMPL;


use App\Http\Repositories\Eloquent\RepositoryEloquent;
use App\Http\Repositories\UserRepositoryInterface;
use App\User;

class UserRepositoryRepository extends RepositoryEloquent implements UserRepositoryInterface
{

    public function getModel()
    {
        // TODO: Implement getModel() method.
        $profile = User::class;
        return $profile;
    }

}

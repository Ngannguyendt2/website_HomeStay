<?php


namespace App\Http\Repositories\IMPL;


use App\Http\Repositories\Eloquent\RepositoryEloquent;
use App\Http\Repositories\UserRepositoryInterface;
use App\User;

class UserRepository extends RepositoryEloquent implements UserRepositoryInterface
{

    public function getModel()
    {
        // TODO: Implement getModel() method.
        $user = User::class;
        return $user;
    }

}

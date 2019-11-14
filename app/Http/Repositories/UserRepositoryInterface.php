<?php


namespace App\Http\Repositories;


interface UserRepositoryInterface extends RepositoryInterface
{
    public function updatePassword($object);
}

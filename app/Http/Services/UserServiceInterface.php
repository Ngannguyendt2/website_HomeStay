<?php


namespace App\Http\Services;


interface UserServiceInterface
{
    public function getAll();

    public function getUserById($id);
}

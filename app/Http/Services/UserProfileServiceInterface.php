<?php


namespace App\Http\Services;


interface UserProfileServiceInterface
{
    public function getAll();

    public function getUserProfileById($id);

    public function getUserById($id);
}

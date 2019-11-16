<?php


namespace App\Http\Services;








interface UserServiceInterface
{
    public function getAll();

    public function getUserById($id);
    public function update($object,$request);

    public function updatePassword($object, $request);
}

<?php


namespace App\Http\Repositories;


interface UserProfileRepositoryInterface extends RepositoryInterface
{
public function getUserById($id);
}

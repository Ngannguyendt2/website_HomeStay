<?php


namespace App\Http\Services;


use App\Http\Repositories\UserRepositoryInterface;

class UserService implements UserServiceInterface
{
    protected $profileRepo;

    public function __construct(UserRepositoryInterface $profileRepo)
    {
        $this->profileRepo = $profileRepo;
    }

    public function getAll()
    {
        // TODO: Implement getAll() method.
        return $this->profileRepo->getAll();
    }

    public function getUserById($id)
    {
        // TODO: Implement getUserById() method.
        return $this->profileRepo->getById($id);
    }
}

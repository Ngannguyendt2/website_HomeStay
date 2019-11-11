<?php


namespace App\Http\Services;


use App\Http\Repositories\UserProfileRepositoryInterface;

class UserProfileService implements UserProfileServiceInterface
{
    protected $profileRepo;

    public function __construct(UserProfileRepositoryInterface $profileRepo)
    {
        $this->profileRepo = $profileRepo;
    }

    public function getAll()
    {
        // TODO: Implement getAll() method.
        return $this->profileRepo->getAll();
    }

    public function getUserProfileById($id)
    {
        // TODO: Implement getUserProfileById() method.
        return $this->profileRepo->getUserProfileById($id);
    }

    public function getUserById($id)
    {
        // TODO: Implement getUserById() method.
        return $this->profileRepo->getUserById($id);
    }
}

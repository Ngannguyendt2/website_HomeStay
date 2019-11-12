<?php


namespace App\Http\Services;


use App\Http\Repositories\UserRepositoryInterface;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Request;

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

    public function update($object, $request)
    {
        if ($request->password == null) {
            $object->name = $request->name;
            $object->email;
            $object->phone = $request->phone;
            $object->address = $request->address;
            $object->password;
            $this->profileRepo->update($object);

        } else {
            $object->name = $request->name;
            $object->email;
            $object->phone = $request->phone;
            $object->address = $request->address;
            if ($request->file('image')) {
            $currentImg=$object->image;
            if ($currentImg) {
                unlink(storage_path('app/public/' . $currentImg));
            }
                $path = $request->file('image')->store('images', 'public');
                $object->image = $path;
            }
            $object->password = Hash::make($request->new_password);
            $this->profileRepo->update($object);
        }
    }
}

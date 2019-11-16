<?php


namespace App\Http\Services;


use App\Http\Repositories\UserRepositoryInterface;
use Illuminate\Support\Facades\Auth;
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

        $object->email;
        $object->name = $request->name;
        $object->phone = $request->phone;
        $object->address = $request->address;
        if ($request->file('image')) {
            $currentImg = $object->image;
            if ($currentImg) {
                unlink(storage_path('app/public/' . $currentImg));
            }
            $path = $request->file('image')->store('images', 'public');
            $object->image = $path;
        }

        $this->profileRepo->update($object);
    }

    public function updatePassword($object, $request)
    {
        if(!(Hash::check($request->current_password, Auth::user()->password))) {
            return redirect()->back()->with('error-password','Mật khẩu cũ không đúng');
        } else {
            $object->password = null;
            $object->password = Hash::make($request->password);
            return $this->profileRepo->updatePassword($object);
        }
    }
}

<?php


namespace App\Http\Services;


use App\House;
use App\Http\Repositories\HouseRepositoryInterface;

class HouseService implements HouseServicceInterface
{
    protected $houseRepo;

    public function __construct(HouseRepositoryInterface $houseRepo)
    {
        $this->houseRepo = $houseRepo;
    }

    public function create($request)
    {
        // TODO: Implement create() method.
        $house = new House();
        $house->name = $request->name;
        $house->address = $request->address;
        $house->price = $request->price;
        $house->totalBathRoom = $request->totalBathRoom;
        $house->totalBedRoom = $request->totalBedRoom;
        $house->description = $request->description;
        $house->status = $request->status;
        $images = array();
        if ($files = $request->file("image")) {
            foreach ($files as $file) {
                $name = $file->getClientOriginalName();
                $file->move('storage/images', $name);
                $images[] = $name;

            }
            $house->image = json_encode($images);
        }
        $house->user_id = $request->user_id;
        $house->category_id = $request->category_id;
        $house->save();
        $this->houseRepo->create($house);
    }
}

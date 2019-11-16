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
        $house->demand = $request->demand;
        $house->name = $request->name;
        $house->province = $request->province;
        $house->district = $request->district;
        $house->ward = $request->ward;
        $house->name_way = $request->name_way;
        $house->house_number = $request->house_number;
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

        $this->houseRepo->create($house);
    }
    public function getCategoryHouse()
    {
        // TODO: Implement getCategoryHouse() method.
        return $this->houseRepo->getCategoryHouse();
    }
}

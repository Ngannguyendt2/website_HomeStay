<?php


namespace App\Http\Services;


use App\House;
use App\Http\Repositories\HouseRepositoryInterface;
use App\Notifications\NewHouse;
use App\User;
use Illuminate\Support\Facades\DB;

class HouseService implements HouseServiceInterface
{
    protected $houseRepo;
    protected $house;

    public function __construct(HouseRepositoryInterface $houseRepo,
                                House $house)
    {
        $this->houseRepo = $houseRepo;
        $this->house = $house;
    }

    public function create($request)
    {
        // TODO: Implement create() method.
        $house = new House();
        $house->demand = $request->demand;
        $house->name = $request->name;
        $house->province_id = $request->province_id;
        $house->district_id = $request->district_id;
        $house->ward_id = $request->ward_id;
        $house->name_way = $request->name_way;
        $house->house_number = $request->house_number;
        $house->price = $request->price;
        $house->totalBathroom = $request->totalBathroom;
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

//        $admin = User::where('admin', 1)->first();
//        if ($admin) {
//            $admin->notify(new NewHouse($house));
//        }
    }

    public function getCategoryHouse()
    {
        // TODO: Implement getCategoryHouse() method.
        return $this->houseRepo->getCategoryHouse();
    }

    public function getHouseById($id)
    {
        // TODO: Implement getHouseById() method.
        return $this->houseRepo->getById($id);
    }

    public function search($request)
    {
        // TODO: Implement search() method.
        if (empty($request->all())) {
            return $this->houseRepo->getAll();
        }
        $model = $this->house;
        if ($request->province_id) {
            $datas[] = [
                'column' => 'province_id',
                'operator' => '=',
                'value' => $request->province_id
            ];
        }
        if ($request->district_id) {
            $datas[] = [
                'column' => 'district_id',
                'operator' => '=',
                'value' => $request->district_id
            ];
        }
        if ($request->ward_id) {
            $datas[] = [
                'column' => 'ward_id',
                'operator' => '=',
                'value' => $request->ward_id
            ];
        }
        if ($request->totalBathroom) {
            $datas[] = [
                'column' => 'totalBathroom',
                'operator' => '=',
                'value' => $request->totalBathroom
            ];
        }
        if ($request->totalBedRoom) {
            $datas[] = [
                'column' => 'totalBathroom',
                'operator' => '=',
                'value' => $request->totalBedRoom
            ];
        }

        foreach ($datas as $key => $data) {
            $model = $model->where($data['column'], $data['value']);
        }
        $result = $model->orderBy('approved_at', 'DESC');
        return $this->houseRepo->search($result);

    }

    public function getAll()
    {
        return $this->houseRepo->getAll();
    }

    public function destroy($id)
    {
        $house = $this->houseRepo->getById($id);
        return $this->houseRepo->destroy($house);
    }
}

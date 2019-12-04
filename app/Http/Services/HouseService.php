<?php


namespace App\Http\Services;


use App\House;
use App\Http\Repositories\HouseRepositoryInterface;
use App\Notifications\NewHouse;
use App\User;
use Carbon\Carbon;
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
        $checkin = Carbon::create($request->checkin);
        $checkout = Carbon::create($request->checkout);
        $model = DB::table('houses')->select('houses.*');
//        $model = $model->leftJoin('orders', 'houses.id', '=', 'orders.house_id')->distinct();
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
                'column' => 'totalBedRoom',
                'operator' => '=',
                'value' => $request->totalBedRoom
            ];
        }
        if ($request->price) {
            $datas[] = [
                'column' => 'price',
                'operator' => '=',
                'value' => $request->price
            ];
        }

        foreach ($datas as $key => $data) {

            if ($request->checkin || $request->checkout) {
                $houses = DB::table('houses')->select('houses.id')
                    ->join('orders', 'houses.id', '=', 'orders.house_id')
                    ->whereBetween('orders.checkin', array($checkin, $checkout))
                    ->whereBetween('orders.checkout', array($checkin, $checkout))->get();
                $array =[];
                foreach ($houses as $house) {
                    array_push($array, $house->id);
                }
                $model->where($data['column'], $data['value'])->whereNotIn('houses.id', $array);
            } else {
                $model = $model->where($data['column'], $data['value']);
            }
        }
        $result = $model->orderBy('houses.approved_at', 'DESC');
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

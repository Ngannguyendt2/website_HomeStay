<?php


namespace App\Http\Services;


interface HouseServiceInterface
{
    public function getAll();
    public function create($request);

    public function getCategoryHouse();

    public function getHouseById($id);
//    public function destroy($object);

}

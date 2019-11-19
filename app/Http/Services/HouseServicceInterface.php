<?php


namespace App\Http\Services;


interface HouseServicceInterface
{
    public function create($request);

    public function getCategoryHouse();

    public function getHouseById($id);
}

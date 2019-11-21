<?php


namespace App\Http\Services;


interface HouseServiceInterface
{
    public function create($request);

    public function getCategoryHouse();

    public function getHouseById($id);

    public function search($request);
}

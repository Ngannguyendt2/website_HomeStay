<?php


namespace App\Http\Services;


interface OrderServiceInterface
{
    public function create($request, $houseId);

    public function checkDate($request, $houseId);

    public function getOrderByHouse($houseId);
}

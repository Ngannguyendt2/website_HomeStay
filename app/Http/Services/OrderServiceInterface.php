<?php


namespace App\Http\Services;


interface OrderServiceInterface
{
    public function create($request, $houseId);

    public function getDateCheckin($houseId);

}

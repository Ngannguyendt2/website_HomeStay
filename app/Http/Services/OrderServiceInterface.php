<?php


namespace App\Http\Services;


interface OrderServiceInterface
{
    public function create($request,$houseId);

}

<?php


namespace App\Http\Repositories\IMPL;


use App\House;
use App\Http\Repositories\Eloquent\RepositoryEloquent;
use App\Http\Repositories\HouseRepositoryInterface;

class HouseRepository extends RepositoryEloquent implements HouseRepositoryInterface
{

    public function getModel()
    {
        // TODO: Implement getModel() method.
        $house = House::class;
        return $house;
    }
}

<?php


namespace App\Http\Repositories\IMPL;


use App\Category;
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

    public function getCategoryHouse()
    {
        // TODO: Implement getCategoryHouse() method.
        $categories = Category::all();
        return $categories;

    }
}

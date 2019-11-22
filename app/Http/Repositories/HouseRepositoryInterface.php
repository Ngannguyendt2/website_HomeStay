<?php


namespace App\Http\Repositories;


interface HouseRepositoryInterface extends RepositoryInterface
{
    public function getCategoryHouse();

    public function search($model);
}

<?php


namespace App\Http\Repositories;


interface OrderRepositoryInterface extends RepositoryInterface
{
    public function checkDate($checkin, $checkout, $houseId);

    public function getOrderByHouse($houseId);



}

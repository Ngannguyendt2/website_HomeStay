<?php


namespace App\Http\Services;


interface OrderServiceInterface
{
    public function create($request, $houseId);

    public function findById($id);

    public function destroy($id);

    public function checkDate($request, $houseId);

    public function getOrderByHouse($houseId);

//    public function getOrderByUser();

    public function getOrderHadCancel();

    public function deleteOrderSoftDelete($id);

}

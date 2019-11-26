<?php


namespace App\Http\Services;


interface OrderServiceInterface
{
    public function create($request, $houseId);

    public function findById($id);

    public function destroy($id);
}

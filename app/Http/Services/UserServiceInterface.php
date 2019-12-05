<?php


namespace App\Http\Services;


interface UserServiceInterface
{
    public function getAll();

    public function getUserById($id);

    public function update($object, $request);

    public function updatePassword($object, $request);

    public function destroy($object);

    public function getUserByHouse($houseId);

    public function getUserByCustomer($customerId);

    public function historyRentHouse();

    public function getRentedHouse();

    public function getMonthlyIncome($request);

    public function getDateOfOrder($request);

    public function getMoneyOfOrder($request);
}

<?php


namespace App\Http\Repositories;


interface UserRepositoryInterface extends RepositoryInterface
{
    public function updatePassword($object);

    public function getUserByHouse($houseId);

    public function getUserByCustomer($customerId);

    public function historyRentHouse();

    public function getMonthlyIncome($startDate, $endDate);
}

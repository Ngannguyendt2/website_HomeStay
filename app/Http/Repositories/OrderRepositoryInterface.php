<?php


namespace App\Http\Repositories;


interface OrderRepositoryInterface extends RepositoryInterface
{
    public function getDateCheckin($id);

    public function getDateCheckout($id);
}

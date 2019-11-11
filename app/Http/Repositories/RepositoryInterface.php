<?php


namespace App\Http\Repositories;


interface RepositoryInterface
{
    public function getAll();

    public function getUserProfileById($id);
}

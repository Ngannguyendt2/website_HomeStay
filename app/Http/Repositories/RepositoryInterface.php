<?php


namespace App\Http\Repositories;


interface RepositoryInterface
{
    public function getAll();

    public function getById($id);
}

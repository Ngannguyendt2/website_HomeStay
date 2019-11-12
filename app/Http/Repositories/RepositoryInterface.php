<?php


namespace App\Http\Repositories;


use Illuminate\Support\Facades\Request;

interface RepositoryInterface
{
    public function getAll();

    public function getById($id);

    public function update($object);
}

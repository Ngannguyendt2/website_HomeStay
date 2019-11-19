<?php


namespace App\Http\Services;


interface CustomerServiceInterface
{
public function create($request);
public function order($request);
}

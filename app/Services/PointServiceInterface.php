<?php


namespace App\services;


interface PointServiceInterface
{
    public function create($data);
    public function getById($id);
    public function calculatorPoint($answers);
}

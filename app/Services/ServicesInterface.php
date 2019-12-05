<?php


namespace App\services;


interface ServicesInterface
{
    public function create($data);

    public function getAll();

    public function delete($id);

    public function update($data, $id);

    public function getByID($id);
}

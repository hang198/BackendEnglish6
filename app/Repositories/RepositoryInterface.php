<?php


namespace App\Repositories;


interface RepositoryInterface
{
    public function create($data);
    public function getAll($orderBy = null);
    public function delete($id);
    public function update($obj, $data);
    public function getByID($id);
}

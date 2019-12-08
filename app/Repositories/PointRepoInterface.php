<?php


namespace App\Repositories;


interface PointRepoInterface
{
    public function create($data);
    public function getById($id);
    public function getByPracticeId($id);
    public function delete($point);
}

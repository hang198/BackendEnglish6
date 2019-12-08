<?php


namespace App\Repositories\impl;


use App\Point;
use App\Repositories\PointRepoInterface;

class PointRepoImpl implements PointRepoInterface
{
    protected $model;

    public function __construct(Point $point)
    {
        $this->model = $point;
    }

    public function create($data)
    {
        return $this->model->create($data);
    }

    public function getById($id)
    {
        return $this->model->find($id);
    }

    public function getByPracticeId($id)
    {
        return $this->model->where('practice_id', $id)->get();
    }

    public function delete($point)
    {
        $point->answers()->detach();
        $point->delete();
    }

    public function getPoint($obj)
    {
        return $obj->get();
    }


}

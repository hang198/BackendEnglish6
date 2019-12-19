<?php


namespace App\Repositories\impl;


use App\Lesson;
use App\Repositories\BaseRepository\BaseRepository;
use App\Repositories\LessonRepoInterface;

class LessonRepoImpl extends BaseRepository implements LessonRepoInterface
{
    protected function setModel()
    {
        return new Lesson();
    }
    public function create($data)
    {
        $this->model->create($data);
    }

    public function update($obj, $data)
    {
        $obj->update($data);
    }

    public function delete($object)
    {
        $object->delete();
    }

    public function getByUnitId($id)
    {
        return $this->model->where('unit_id', $id)->get();
    }
}

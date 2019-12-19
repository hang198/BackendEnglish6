<?php


namespace App\Repositories\impl;


use App\Practice;
use App\Repositories\BaseRepository\BaseRepository;
use App\Repositories\PracticeRepoInterface;

class PracticeRepoImpl extends BaseRepository implements PracticeRepoInterface
{

    protected function setModel()
    {
        return new Practice();
    }

    public function create($data)
    {
        $practice = $this->model->create($data);
        $practice->questions()->attach($data['questions']);
    }

    public function update($obj, $data)
    {
        $obj->update($data);
        $obj->questions()->sync($data['questions']);
    }

    public function delete($object)
    {
        $object->questions()->detach();
        $object->delete();
    }

    public function getByLessonId($id)
    {
        return $this->model->where('lesson_id', $id)->get();
    }


}

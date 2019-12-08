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
        $quiz = $this->model->create($data);
        $quiz->asks()->attach($data['asks']);
    }

    public function update($obj, $data)
    {
        $obj->update($data);
        $obj->asks()->sync($data['asks']);
    }

    public function delete($object)
    {
        $object->asks()->detach();
        $object->delete();
    }

    public function getByLessonId($id)
    {
        return $this->model->where('lesson_id', $id)->get();
    }


}

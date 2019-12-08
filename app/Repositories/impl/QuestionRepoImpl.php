<?php


namespace App\Repositories\impl;


use App\Question;
use App\Repositories\QuestionRepoInterface;
use App\Repositories\BaseRepository\BaseRepository;

class QuestionRepoImpl extends BaseRepository implements QuestionRepoInterface
{

    protected function setModel()
    {
        return new Question();
    }

    public function create($data)
    {
        return $this->model->create($data);
    }

    public function delete($obj)
    {
        $obj->practices()->detach();
        $obj->delete();
    }

}

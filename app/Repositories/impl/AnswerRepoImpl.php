<?php


namespace App\Repositories\impl;


use App\Answer;
use App\Repositories\AnswerRepoInterface;
use App\Repositories\BaseRepository\BaseRepository;

class AnswerRepoImpl extends BaseRepository implements AnswerRepoInterface
{

    protected function setModel()
    {
        return new Answer();
    }
    public function delete($id)
    {
       $this->model->where('ask_id', $id)->delete();
    }

}

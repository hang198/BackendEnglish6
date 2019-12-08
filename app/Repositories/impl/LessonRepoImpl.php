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
}

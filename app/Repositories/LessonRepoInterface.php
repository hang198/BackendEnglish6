<?php


namespace App\Repositories;


interface LessonRepoInterface extends RepositoryInterface
{
    public function getByUnitId($id);

}

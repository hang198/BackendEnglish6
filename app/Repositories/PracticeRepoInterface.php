<?php


namespace App\Repositories;


use App\services\PracticeServiceInterface;

interface PracticeRepoInterface extends RepositoryInterface
{
    public function getByLessonId($id);
}

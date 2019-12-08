<?php


namespace App\services;


interface PracticeServiceInterface extends ServicesInterface
{
    public function submitResult($request);
    public function getByLessonId($id);
}

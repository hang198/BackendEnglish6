<?php


namespace App\Services;


interface LessonServiceInterface extends ServicesInterface
{
    public function getByUnitId($id);

}

<?php


namespace App\services;


interface QuestionServiceInterface extends ServicesInterface
{

    public function getByPracticeId($id);
}

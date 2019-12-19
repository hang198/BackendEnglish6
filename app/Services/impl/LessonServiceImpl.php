<?php


namespace App\Services\impl;

use App\Practice;
use App\Repositories\LessonRepoInterface;
use App\Services\LessonServiceInterface;
use App\services\PracticeServiceInterface;

class LessonServiceImpl implements LessonServiceInterface
{
    protected $lessonRepo;
    protected $practiceService;

    public function __construct(LessonRepoInterface $lessonRepo,
                                PracticeServiceInterface $practiceService)
    {
        $this->lessonRepo = $lessonRepo;
        $this->practiceService = $practiceService;
    }

    public function create($data)
    {
        $this->lessonRepo->create($data);
    }

    public function getByID($id)
    {
        return $this->lessonRepo->getByID($id);
    }

    public function getAll()
    {
        return $this->lessonRepo->getAll();
    }

    public function delete($id)
    {
        $lesson = $this->getByID($id);
        $practice = $this->practiceService->getByLessonId($id);
        foreach ($practice as $item) {
            $this->practiceService->delete($item->id);
        }
        $this->lessonRepo->delete($lesson);
    }


    public function update($data, $id)
    {
        $lesson = $this->getByID($id);
        $this->lessonRepo->update($lesson, $data);
    }

    public function getByUnitId($id)
    {
        return $this->lessonRepo->getByUnitId($id);
    }
}

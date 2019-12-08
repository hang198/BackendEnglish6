<?php


namespace App\services\impl;


use App\Http\Controllers\UserController;
use App\Practice;
use App\Repositories\AnswerRepoInterface;
use App\Repositories\PracticeRepoInterface;
use App\services\PointServiceInterface;
use App\services\PracticeServiceInterface;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Facades\JWTAuth;

class PracticeServiceImpl implements PracticeServiceInterface
{
    protected $practiceRepo;
    protected $answerRepo;
    protected $pointService;

    public function __construct(PracticeRepoInterface $practiceRepo,
                                AnswerRepoInterface $answerRepo,
                                PointServiceInterface $pointService)
    {
        $this->practiceRepo = $practiceRepo;
        $this->answerRepo = $answerRepo;
        $this->pointService = $pointService;
    }

    public function create($data)
    {

        $this->practiceRepo->create($data);
    }

    public function getAll()
    {
        return $this->practiceRepo->getAll();
    }

    public function delete($id)
    {
        $practice = $this->getByID($id);
        $this->pointService->delete($id);
        $this->practiceRepo->delete($practice);
    }

    public function update($data, $id)
    {
        $practice = $this->getByID($id);
        $this->practiceRepo->update($practice, $data);
    }

    public function getByID($id)
    {
        return $this->practiceRepo->getByID($id);
    }

    public function submitResult($request)
    {
        $score = 0;
        $data = json_decode($request['data']);
        foreach ($data as $answers) {
            if (!empty($answers)) {
                $isCorrect = $this->checkResult($answers);
                if ($isCorrect) {
                    $score++;
                }
            }
        }
        $point = $this->pointService->create([
            'user_id' => $request['currentUser'],
            'point' => $score,
            'practice_id' => $request['practice_id']
        ]);
        $this->pointService->selectedAnswer($point, $data);
        return $point;
    }

    public function checkResult($answers)
    {
        $count = 0;
        foreach ($answers as $answer) {
            $count++;
            if (!$answer->isAnswer) {
                $count = 0;
            }
        }
        return ($count !== 0) ? true : false;
    }

    public function getByLessonId($id)
    {
        return $this->practiceRepo->getByLessonId($id);
    }
}

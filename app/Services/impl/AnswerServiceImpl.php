<?php


namespace App\services\impl;


use App\Repositories\AnswerRepoInterface;
use App\services\AnswerServiceInterface;

class AnswerServiceImpl implements AnswerServiceInterface
{
    protected $answerRepo;

    public function __construct(AnswerRepoInterface $answerRepo)
    {
        $this->answerRepo = $answerRepo;
    }

    public function create($question, $answers)
    {
        foreach ($answers as $answer) {
            $data = ['question_id' => $question->id, 'content' => $answer->content, 'correct' => $answer->correct,];
            $this->answerRepo->create($data);
        }
    }

    public function delete($id) {
        $this->answerRepo->delete($id);
    }

}

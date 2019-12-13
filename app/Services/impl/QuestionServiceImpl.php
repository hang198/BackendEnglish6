<?php


namespace App\services\impl;


use App\Repositories\QuestionRepoInterface;
use App\services\AnswerServiceInterface;
use App\services\QuestionServiceInterface;
use App\services\PracticeServiceInterface;

class QuestionServiceImpl implements QuestionServiceInterface
{
    protected $questionRepo;
    protected $answerService;
    protected $practiceService;

    public function __construct(QuestionRepoInterface $questionRepo,
                                AnswerServiceInterface $answerService,
                                PracticeServiceInterface $practiceService)
    {
        $this->questionRepo = $questionRepo;
        $this->answerService = $answerService;
        $this->practiceService = $practiceService;
    }

    public function create($data)
    {

        $question = $this->questionRepo->create($data);
        $answers = json_decode($data['answer']);
        $this->answerService->create($question, $answers);
    }

    public function getAll()
    {
        $questions = $this->questionRepo->getAll();
        return $questions;
    }

    public function getByID($id)
    {
        $question = $this->questionRepo->getByID($id);
        return $question;
    }

    public function delete($id)
    {
        $question = $this->questionRepo->getByID($id);
        $this->answerService->delete($id);
        $this->questionRepo->delete($question);
    }

    public function update($data, $id)
    {
        $question = $this->getByID($id);
        $this->answerService->delete($id);
        $this->answerService->create($question, json_decode($data['answer']));
        $this->questionRepo->update($question, $data);
    }

    public function getByPracticeId($id)
    {
        $item = [];
        $practice = $this->practiceService->getByID($id);
        $questions = $practice->questions;
        foreach ($questions as $question){
            $question->answers;
            $item[] = ['question' => $question];
        }
        return [
          'practice' => $practice,
          'questions' => $item,
        ];
    }
}

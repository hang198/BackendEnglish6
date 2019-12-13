<?php

namespace App\Http\Controllers;

use App\Answer;
use App\Question;
use App\Http\Requests\QuestionFormRequest;
use App\services\AnswerServiceInterface;
use App\services\QuestionServiceInterface;
use App\services\PracticeServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class QuestionController extends Controller
{
    protected $questionService;
    protected $practiceService;

    public function __construct(QuestionServiceInterface $questionService,
                                PracticeServiceInterface $practiceService)
    {
        $this->questionService = $questionService;
        $this->practiceService = $practiceService;
    }

    public function create(Request $request)
    {
            try {
                $this->questionService->create($request->all());
            } catch (\Exception $e) {
                return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
            }
            return response()->json(['status' => 'success']);

    }

    public function getAll()
    {
        try {
            $questions = $this->questionService->getAll();
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }
        return response()->json(['status' => 'success', 'data' => $questions]);
    }

    public function getOneQuestionAndAnswers($id)
    {
        try {
            $question = $this->questionService->getByID($id);
            $question->answers;
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }
        return response()->json(['status' => 'success', 'question' => $question]);
    }

    public function delete($id)
    {
            try {
                $this->questionService->delete($id);
            } catch (\Exception $e) {
                return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
            }
            return response()->json(['status' => 'success']);
    }

    public function update(QuestionFormRequest $request, $id)
    {

            try {
                $this->questionService->update($request->all(), $id);
            } catch (\Exception $e) {
                return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
            }
            return response()->json(['status' => 'success']);
    }

    public function getByPracticeId($id)
    {
        try {
            $data = $this->questionService->getByPracticeId($id);
            return response()->json(['status' => 'success', 'data' => $data['questions'], 'practice' => $data['practice']]);
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }
}

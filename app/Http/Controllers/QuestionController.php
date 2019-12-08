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
        if (Gate::allows('create')) {
            try {
                $this->questionService->create($request->all());
            } catch (\Exception $e) {
                return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
            }
            return response()->json(['status' => 'success']);
        }else {
            return response()->json(['status' => 'error', 'message' => 'Bạn chưa được cấp quyền'], 403);
        }
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
        if (Gate::allows('delete')){
            try {
                $this->questionService->delete($id);
            } catch (\Exception $e) {
                return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
            }
            return response()->json(['status' => 'success']);
        }
        return response()->json(['status' => 'error', 'message' => 'Bạn chưa được cấp quyền!'], 403);
    }

    public function update(QuestionFormRequest $request, $id)
    {
        if (Gate::allows('editor')){
            try {
                $this->questionService->update($request->all(), $id);
            } catch (\Exception $e) {
                return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
            }
            return response()->json(['status' => 'success']);
        }
        return response()->json(['status' => 'error', 'message' => 'Bạn chưa được cấp quyền'], 403);
    }

    public function getByPracticeId($id)
    {
        try {
            $questions = $this->questionService->getByPracticeId($id);
            $quiz = $this->practiceService->getByID($id);
            return response()->json(['status' => 'success', 'data' => $questions, 'quiz' => $quiz]);
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }
}

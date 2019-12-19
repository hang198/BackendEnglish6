<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePracticeFormRequest;
use App\Services\LessonServiceInterface;
use App\services\PracticeServiceInterface;
use Illuminate\Http\Request;

class practiceController extends Controller
{
    protected $practiceService;
    private $lessonService;

    public function __construct(PracticeServiceInterface $practiceService,LessonServiceInterface $lessonService)
    {
        $this->practiceService = $practiceService;
        $this->lessonService = $lessonService;
    }

    public function create(CreatePracticeFormRequest $request)
    {
            try {
                $test = $this->practiceService->create($request->all());
            } catch (\Exception $e) {
                return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
            }
            return response()->json(['status' => 'success', 'data' => $test]);

    }

    public function getAll()
    {
        try {
            $practices = $this->practiceService->getAll();
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }
        return response()->json(['status' => 'success', 'data' => $practices]);
    }

    public function getByLessonId($id)
    {
        try {
            $lesson = $this->lessonService->getByID($id);
            $practiceByLesson = $lesson->practice;
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }
        return response()->json(['status' => 'success', 'data' => $practiceByLesson,'lesson' => $lesson]);
    }
    public function getByID($id)
    {
        try {
            $practice = $this->practiceService->getByID($id);
            $practice->questions;
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }
        return response()->json(['status' => 'success', 'data' => $practice]);
    }


    public function update(Request $request, $id)
    {
            try {
                $this->practiceService->update($request->all(), $id);
            } catch (\Exception $e) {
                return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
            }
            return response()->json(['status' => 'success']);

    }

    public function delete($id)
    {

            try {
                $this->practiceService->delete($id);
            } catch (\Exception $e) {
                return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
            }
            return response()->json(['status' => 'success']);

    }

    public function submitResult(Request $request)
    {
        try {
            $point = $this->practiceService->submitResult($request->all());
            return response()->json(['status' => 'success', 'data' => $point]);
        } catch (\Exception $e) {
            return response()->json(['status' => 'success', 'error' => $e->getMessage()]);
        }
    }

    public function getPointByID($id)
    {

        try {
            $practice = $this->practiceService->getByID($id);
            $practice->users;
            $practice->points;
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }
        return response(['status' => 'success', 'data' => $practice]);
    }


}

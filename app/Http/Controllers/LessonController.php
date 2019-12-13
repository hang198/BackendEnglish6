<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateLessonFormRequest;
use App\Services\LessonServiceInterface;
use App\services\UnitServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class LessonController extends Controller
{
    protected $lessonService;
    protected $unitService;

    public function __construct(LessonServiceInterface $lessonService,
                                UnitServiceInterface $unitService)
    {
        $this->lessonService = $lessonService;
        $this->unitService = $unitService;
    }

    public function getAll()
    {
        try {
            $lessons = $this->lessonService->getAll();
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }
        return response()->json(['status' => 'success', 'data' => $lessons]);
    }

    public function create(CreateLessonFormRequest $request)
    {
            try {
                $this->lessonService->create($request);
            } catch (\Exception $e) {
                return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
            }
            return response()->json(['status' => 'success']);
    }

    public function delete($id)
    {
            try {
                $test = $this->lessonService->delete($id);
            } catch (\Exception $e) {
                return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
            }
            return response()->json(['status' => 'success', $test]);

    }

    public function getByID($id)
    {
        try {
            $lesson = $this->lessonService->getByID($id);
            $lesson->practice;
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }
        return response()->json(['status' => 'success', 'data' => $lesson]);
    }

    public function update(CreateLessonFormRequest $request, $id)
    {


            try {
                $this->lessonService->update($request, $id);
            } catch (\Exception $e) {
                return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
            }
            return response()->json(['status' => 'success']);

    }
}

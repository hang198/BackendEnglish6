<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateLessonFormRequest;
use App\Services\LessonServiceInterface;
use App\services\UnitServiceInterface;
use Illuminate\Http\Request;

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
                $test = $this->lessonService->create($request->all());
            } catch (\Exception $e) {
                return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
            }
        return response()->json(['status' => 'success', 'data' => $test]);
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

    public function getByUnitId($id)
    {
        try {
            $unit = $this->unitService->getByID($id);
            $lessonByUnit = $unit->lessons;
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }
        return response()->json(['status' => 'success', 'data' => $lessonByUnit,'unit' => $unit]);
    }
    public function getByID($id)
    {
        try {
            $lesson = $this->lessonService->getByID($id);
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }
        return response()->json(['status' => 'success', 'data' => $lesson]);
    }


    public function update(Request $request, $id)
    {
            try {
                $this->lessonService->update($request->all(), $id);
            } catch (\Exception $e) {
                return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
            }
            return response()->json(['status' => 'success']);
    }
}

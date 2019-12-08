<?php

namespace App\Http\Controllers;

use App\services\PointServiceInterface;
use Illuminate\Http\Request;

class PointController extends Controller
{
    protected $pointService;

    public function __construct(PointServiceInterface $pointService)
    {
        $this->pointService = $pointService;
    }

    public function create(Request $request)
    {
        try {
            $point = $this->pointService->create($request);
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }
        return response()->json(['status' => 'success', 'data' => $point]);
    }

    public function getById($id)
    {
        try {
            $items = $this->pointService->getById($id);
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }
        return response()->json(['status' => 'success', 'practice' => $items['practice'], 'data' => $items['questions'], 'point' => $items['point']]);
    }

    public function getPointsMaxByUserID($userID)
    {
        try {
            $points = $this->pointService->getPointsMaxByUserID($userID);
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }
        return response()->json(['status' => 'success', 'data' => $points]);
    }


    public function getPointsByTime($userID)
    {
        try {
            $points = $this->pointService->getPointsByTime($userID);
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }
        return response()->json(['status' => 'success', 'data' => $points]);

    }

    public function getPointsOrPracticeByTime($practiceID)
    {
        try {
            $points = $this->pointService->getPointsOfpracticeByTime($practiceID);
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }
        return response()->json(['status' => 'success', 'data' => $points]);

    }

    public function getPointsOfPracticeSort($practiceID)
    {
        try {
            $points = $this->pointService->getPointsOfpracticeSort($practiceID);
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }
        return response()->json(['status' => 'success', 'data' => $points]);

    }

}

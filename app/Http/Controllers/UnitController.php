<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUnitFormRequest;
use App\services\UnitServiceInterface;
use App\Unit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;

class UnitController extends Controller
{
    protected $unitService;

    public function __construct(UnitServiceInterface $unitService)
    {
        $this->unitService = $unitService;
    }

    public function getAll()
    {
        try {
            $units = $this->unitService->getAll();
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }
        return response()->json(['status' => 'success', 'data' => $units]);
    }

    public function create(CreateUnitFormRequest $request)
    {
            try {
                $this->unitService->create($request);
            } catch (\Exception $e) {
                return response()->json(['status' => 'error',
                    'message' => $e->getMessage()]);
            }
            return response()->json(['status' => 'success']);

    }

    public function delete($id)
    {

            try {
                $test = $this->unitService->delete($id);
            } catch (\Exception $e) {
                return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
            }
            return response()->json(['status' => 'success', $test]);

    }

    public function getByID($id)
    {
        try {
            $unit = $this->unitService->getByID($id);
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }
        return response()->json(['status' => 'success', 'data' => $unit]);
    }

    public function update(CreateUnitFormRequest $request, $id)
    {

            try {
                $this->unitService->update($request, $id);
            } catch (\Exception $e) {
                return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
            }
            return response()->json(['status' => 'success']);

    }
}

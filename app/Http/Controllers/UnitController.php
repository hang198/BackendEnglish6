<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUnitFormRequest;
use App\services\UnitServiceInterface;
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
        if (Gate::allows('create')) {
            try {
                $this->unitService->create($request);
            } catch (\Exception $e) {
                return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
            }
            return response()->json(['status' => 'success']);
        }
        return response()->json(['status' => 'error'], 403);
    }

    public function delete($id)
    {
        if (Gate::allows('delete')) {
            try {
                $test = $this->unitService->delete($id);
            } catch (\Exception $e) {
                return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
            }
            return response()->json(['status' => 'success', $test]);
        }
        return response()->json(['status' => 'error'], 403);
    }

    public function getByID($id)
    {
        try {
            $unit = $this->unitService->getByID($id);
            $unit->lessons;
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }
        return response()->json(['status' => 'success', 'data' => $unit]);
    }

    public function update(CreateUnitFormRequest $request, $id)
    {

        if (Gate::allows('editor')) {
            try {
                $this->unitService->update($request, $id);
            } catch (\Exception $e) {
                return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
            }
            return response()->json(['status' => 'success']);
        }
        return response()->json(['status' => 'error'], 403);
    }
}

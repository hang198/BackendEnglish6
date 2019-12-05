<?php

namespace App\Http\Controllers;

use App\services\RoleServiceInterface;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    protected $roleService;

    public function __construct(RoleServiceInterface $roleService)
    {
        $this->roleService = $roleService;
    }

    public function getAll()
    {
        try {
            $roles = $this->roleService->getAll();
        }catch (\Exception $e) {
            return response()->json(['status' => false, 'message' => $e->getMessage()]);
        }
        return response()->json(['status' => true, 'data' => $roles]);
    }
}

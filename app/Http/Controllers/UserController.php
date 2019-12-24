<?php

namespace App\Http\Controllers;

use App\Http\Requests\ChangePasswordFormRequest;
use App\Http\Requests\RegisterFormRequest;
use App\Http\Requests\UserFormRequest;
use App\services\UserServiceInterface;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Facades\JWTAuth;

class UserController extends Controller
{
    private $userService;

    public function __construct(UserServiceInterface $userService)
    {
        $this->userService = $userService;
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->only(['name', 'password']);
        try {
            if (!$token = JWTAuth::attempt($credentials)) {
                return response()->json(['error' => 'Hãy đảm bảo điền đầy đủ thông tin và kiểm tra Tài khoản hoặc mật khẩu không chính xác!'], 401);
            };
            $user = auth()->user();
            $role = $user->role;
            $role->permissions;
            return response()->json(['token' => $token, 'role' => $role]);
        } catch (JWTException $e) {
            return response()->json(['error' => 'Không thể tạo token!'], 500);
        }
    }

    public function register(RegisterFormRequest $request, User $user)
    {
        $data = [
            'name' => $request->name,
            'password' => Hash::make($request->password),
            'role_id' => 2];
        $user = $user->create($data);
        $role = $user->role;
        $role->permissions;
        $token = JWTAuth::attempt($request->only(['name', 'password']));
        return response()->json(['token' => $token, 'role' => $role]);
    }

    public function changePassword(ChangePasswordFormRequest $request)
    {
        $currentUser = JWTAuth::parseToken()->authenticate();
        $currentPassword = $currentUser->password;
        $isOldPassword = Hash::check($request->oldPassword, $currentPassword);
        if ($isOldPassword) {
            $data = ['password' => Hash::make($request->newPassword)];
            $currentUser->update($data);
            return response()->json(['status' => true, 'message' => 'Thay đổi mật khẩu thành công!']);
        } else {
            return response()->json(['status' => false, 'message' => 'Bạn phải nhập đúng mật khẩu cũ!']);
        }
    }

    public function getCurrentUser()
    {
        try {
            $user = JWTAuth::parseToken()->authenticate();
        } catch (JWTException $e) {
            return response()->json(['status' => 'error', 'error' => $e->getMessage()]);
        }
        return response()->json(['status' => 'success', 'data' => $user]);
    }

    public function getAll()
    {

        try {
            $users = $this->userService->getAll();
        } catch (JWTException $e) {
            return response()->json(['status' => 'error', 'error' => $e->getMessage()]);
        }
        return response()->json(['status' => 'success', 'data' => $users]);

    }

    public function getById($id)
    {

        try {
            $user = $this->userService->getByID($id);
            $user->points;
            $user->quizs;
            $user->role;
        } catch (JWTException $e) {
            return response()->json(['status' => 'error', 'error' => $e->getMessage()]);
        }
        return response()->json(['status' => 'success', 'data' => $user]);
    }

    public function update(Request $request, $id)
    {

        try {
            $this->userService->update($request, $id);
        } catch (\Exception $e) {
            return response()->json(['status' => false, 'message' => $e->getMessage()]);
        }
        return response()->json(['status' => true]);
    }

    public function editInfo(UserFormRequest $request, $id)
    {
        try {
            $user = $this->userService->editInfo($request, $id);
        } catch (\Exception $e) {
            return response()->json(['status' => false, 'message' => $e->getMessage()]);
        }
        return response()->json(['status' => true, 'message' => 'Cập nhật dữ liệu thành công!']);
    }
}

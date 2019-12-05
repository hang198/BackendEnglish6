<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChangePasswordFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'newPassword' => 'required|min:6|different:oldPassword',
            'passwordConfirm' => 'required|same:newPassword',
            'oldPassword' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'newPassword.required' => 'Bạn không thể bỏ trống mật khẩu mới!',
            'newPassword.min' => 'Bạn cần nhập mật khẩu mới có độ dài lớn hơn 6 ký tự!',
            'newPassword.different' => 'Bạn cần nhập mật khẩu mới khác mật khẩu cũ!',
            'oldPassword.required' => 'Bạn không thể bỏ trống mật khẩu cũ!',
            'passwordConfirm.required' => 'Bạn không thể bỏ trống xác nhận mật khẩu!',
            'passwordConfirm.same' => 'Mật khẩu này không khớp!',
        ];
    }
}

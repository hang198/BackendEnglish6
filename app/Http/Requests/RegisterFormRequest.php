<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterFormRequest extends FormRequest
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

            'name' => 'required',
            'password' => 'required|min:6',
            'passwordConfirm' => 'required|same:password'
        ];
    }
    public function messages()
    {
        $messages = [
            'name.required' => '* vui lòng nhập tên! ',
            'password.required' => ' * vui lòng nhập mật khẩu ',
            'passwordConfirm.required' => ' * vui lòng nhập lại mật khẩu',
            'password.min' => '* mật khẩu tối thiểu  6 ký tự ',
            'passwordConfirm.same' => '* mật khẩu không khớp',
        ];
        return $messages;
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
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
            'age' => 'required|max:2|min:1',
            'phone' => 'required|min:10'
        ];
    }
    public function messages()
    {
        $messages = [
            'name.required' => '* vui lòng nhập tên! ',
            'age.required' => '*vui lòng nhập tuổi của bạn!',
            'age.max' => '*tuổi không hợp lệ',
            'age.min' => '*tuổi không hợp lệ ',
            'phone.require' => '*sdt không hợp lệ ',
            'phone.min' => '*sdt quá ngắn '
        ];
        return $messages;
    }
}

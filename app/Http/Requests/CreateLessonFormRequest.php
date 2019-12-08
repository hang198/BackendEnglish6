<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateLessonFormRequest extends FormRequest
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
        return[
            'name.required' => 'Tên danh mục không thể bỏ trống!',
            'name.unique' => 'Tên danh mục này đã tồn tại!',
            'content.required' => 'Tên danh mục không thể bỏ trống!',
            'content.unique' => 'Tên danh mục này đã tồn tại!',
        ];
    }
}

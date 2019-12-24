<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateUnitFormRequest extends FormRequest
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
         'name' => 'required|unique:units,name',
         'name_vi' => 'required|unique:units,name'
     ];
    }
    public function messages()
    {
        return[
            'name.required' => 'Tên danh mục không thể bỏ trống!',
            'name.unique' => 'Tên danh mục này đã tồn tại!',
            'name_vi.required' => 'Tên danh mục không thể bỏ trống!',
            'name_vi.unique' => 'Tên danh mục này đã tồn tại!'
        ];
    }
}

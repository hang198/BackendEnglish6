<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoryRequest extends FormRequest
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
            'title' => 'required|unique:stories,title',
            'catestory_id'   => 'required',
            'image'   => 'image'
        ];
    }

    public function messages(){
        return [
            'title.required' => 'Please enter title story',
            'title.unique' =>'This name story is exist',
            'catestory_id.required' => 'Please choose id category story',
            'image.image' => 'This file is not image'
        ];
    }
}

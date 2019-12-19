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
            'txtTitleStory' => 'required|unique:stories,storytitle', 
            'id_category'   => 'required',
            'imagesStory'   => 'image'
        ];
    }

    public function messages(){
        return [
            'txtTitleStory.required' => 'Please enter title story',
            'txtTitleStory.unique' =>'This name story is exist', 
            'id_category.required' => 'Please choose id category story',
            //'imagesStory.required' => 'Please choose image',
            'imagesStory.image' => 'This file is not image'
        ]; 
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CateStoryRequest extends FormRequest
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
            'txtTitleEn' => 'required|unique:catestory,catesto_title',
            'Type' => 'required|unique:catestory,type',
            'txtOrder' => 'required|unique:catestory,order',
            'imagesStory'   => 'image'
        ];
    }

    public function messages(){
        return [
            'txtTitleEn.required' => 'Please enter Title-En category story',
            'txtTitleEn.unique' =>'This name catestory is exist',
            'Type.required' => 'Please enter type category story',
            'Type.unique' =>'This type catestory is exist',
            'txtOrder.required' => 'Please enter Order number category story',
            'txtOrder.unique' =>'This Order number catestory is exist',
            //'imagesStory.required' => 'Please choose image',
            'imagesStory.image' => 'This file is not image'
        ]; 
    }
}

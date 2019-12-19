<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CateVideoRequest extends FormRequest
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
            'txtTitleEn' => 'required|unique:catevideo,catevi_title',
            'Type' => 'required|unique:catevideo,type',
            'txtOrder' => 'required|unique:catevideo,order',
            'imagesStory'   => 'image'
        ];
    }

    public function messages(){
        return [
            'txtTitleEn.required' => 'Please enter Title-En category video',
            'txtTitleEn.unique' =>'This name category video is exist',
            'Type.required' => 'Please enter type category video',
            'Type.unique' =>'This type category is exist',
            'txtOrder.required' => 'Please enter Order number category story',
            'txtOrder.unique' =>'This Order number catestory is exist',
            //'imagesStory.required' => 'Please choose image',
            'imagesStory.image' => 'This file is not image'
        ]; 
    }
}

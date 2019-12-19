<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VideoRequest extends FormRequest
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
            'txtTitleVideo' => 'required|unique:videos,videotitle', 
            'id_category'   => 'required',
            'imagesStory'   => 'image',
            'urlVideo'      => 'required|unique:videos,link'
        ];
    }

    public function messages(){
        return [
            'txtTitleVideo.required' => 'Please enter title video',
            'txtTitleVideo.unique' =>'This name video is exist', 
            'id_category.required' => 'Please choose category video',
            'urlVideo.required' => 'Please enter link video',
            'urlVideo.unique' =>'This link video is exist',
            'imagesStory.image' => 'This file is not image'
        ]; 
    }
}

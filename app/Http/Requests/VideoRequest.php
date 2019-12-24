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
            'title' => 'required|unique:videos,title',
            'catevideo_id'   => 'required',
            'image'   => 'required',
            'link'      => 'required|unique:videos,link'
        ];
    }

    public function messages(){
        return [
            'title.required' => 'Please enter title video',
            'title.unique' =>'This name video is exist',
            'catevideo_id.required' => 'Please choose category video',
            'link.required' => 'Please enter link video',
            'link.unique' =>'This link video is exist',
            'image.required' => 'Please choose image'
        ];
    }
}

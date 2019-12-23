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
            'title' => 'required|unique:catevideo,title',
            'type' => 'required|unique:catevideo,type',
            'order' => 'required|unique:catevideo,order',
            'image'   => 'image'
        ];
    }

    public function messages(){
        return [
            'title.required' => 'Please enter title category video',
            'title.unique' =>'This name category video is exist',
            'type.required' => 'Please enter type category video',
            'type.unique' =>'This type category is exist',
            'order.required' => 'Please enter Order number category story',
            'order.unique' =>'This Order number catestory is exist',
            'image.image' => 'This file is not image'
        ];
    }
}

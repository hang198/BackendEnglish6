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
            'order' => 'required|unique:catevideo,order',
            'image'   => 'required'
        ];
    }

    public function messages(){
        return [
            'title.required' => 'Please enter title category video',
            'title.unique' =>'This name category video is exist',
            'order.required' => 'Please enter Order number category story',
            'order.unique' =>'This Order number catestory is exist',
            'image.required' => 'Please choose image'
        ];
    }
}

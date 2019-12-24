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
            'title' => 'required|unique:catestory,title',
            'type' => 'required|unique:catestory,type',
            'order' => 'required|unique:catestory,order',
            'image'   => 'required'
        ];
    }

    public function messages(){
        return [
            'title.required' => 'Please enter Title-En category story',
            'title.unique' =>'This name catestory is exist',
            'type.required' => 'Please enter type category story',
            'type.unique' =>'This type catestory is exist',
            'order.required' => 'Please enter Order number category story',
            'order.unique' =>'This Order number catestory is exist',
            'image.required' => 'Please choose image'
        ];
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TuBlogPost extends FormRequest
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
            't_name' => 'required|unique:brand|max:255'  ,
            't_zuo' =>'required',
        ];
    }
    public function messages(){
        return [
            't_name.required'=>'书名称必填!',
                 'x_name.unique'=>'书名已存在!',
                 't_zuo.required'=>'作者必填!'
        ];
       }
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBlogPost extends FormRequest
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
            'brand_name' => 'required|unique:brand|max:255'  ,
            'brand_urn' =>'required',
        ];
    }
    public function messages(){
        return [
            'brand_name.required'=>'品牌名称必填!',
                 'brand_name.unique'=>'品牌已存在!',
                 'brand_urn.required'=>'品牌网址必填!'
        ];
       }
       
}

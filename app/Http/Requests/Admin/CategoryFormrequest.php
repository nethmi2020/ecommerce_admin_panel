<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class CategoryFormrequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name'=>[
                'required',
                'string',
                'max:200'
            ],
            'slug'=>[
                'required',
                'string',
                'max:200'
            ],
            'description'=>[
                'required',
            ],
            'image'=>[
                'nullable',
                // 'mimes:jpeg,jpg,png',
            ],
            'meta_title'=>[
                'required',
                'string',
                'max:200'
            ],

            'meta_description'=>[
                'required',
                'string',
                'max:200'
            ],

            'meta_keyword'=>[
                'required',
                'string',
                'max:200'
            ],
            'navbar_status'=>[
                'nullable'
                
            ],
            'status'=>[
                'nullable'
               
            ],

        ];
    }
}

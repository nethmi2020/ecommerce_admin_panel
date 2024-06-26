<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class PostFormrequest extends FormRequest
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
            
            'category_id'=>[
                'required'
            ],
            'name'=>[
                'required',
                'string',
            ],
            'slug'=>[
                'required',
                'string',
            ],
            'description'=>[
                'required',
            ],
            'yt_iframe'=>[
                'nullable',
                'string',
            ],
            'meta_title'=>[
                'required',
                'string',
            ],

            'meta_description'=>[
                'nullable',
                'string',
            ],

            'meta_keyword'=>[
                'nullable',
                'string',
            ],
           
            'status'=>[
                'nullable'
               
            ],
        ];
    }
}

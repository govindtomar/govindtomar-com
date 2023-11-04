<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PackageRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'name'  =>  'required',
			'user_id'  =>  'required',
			'slug'  =>  'required',
			'path'  =>  'required',
			'description'  =>  'required',
			'image'  =>  '',
			'publish'  =>  '',
			'meta_title'  =>  'required',
			'meta_description'  =>  'required',
			'meta_keyword'  =>  'required',
        ];
    }

}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactMeRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'name'  =>  'required',
			'email'  =>  'required',
			'phone'  =>  'required',
			'message'  =>  'required',
        ];
    }

}

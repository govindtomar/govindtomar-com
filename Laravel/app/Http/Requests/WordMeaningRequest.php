<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WordMeaningRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'word'  =>  'required',
			'meaning'  =>  'required',
			'detail'  =>  '',
			'sentence'  =>  '',
			'status'  =>  '',
        ];
    }

}

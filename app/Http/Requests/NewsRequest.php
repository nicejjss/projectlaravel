<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewsRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'img' => 'required|image|mimes:png,jpg,jpeg',
            '*'=>'required',
        ];
    }
}

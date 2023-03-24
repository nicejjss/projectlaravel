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
            'img' => 'image|mimes:png,jpg,jpeg',
            'title' => 'required',
            'description' => 'required',
            'content' => 'required',
        ];
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules()
    {
        return [
            'name' => ['required','min:8','max:20'],
            'phone' => ['required','numeric','min:10'],
            'email' => 'required',
            'password' => ['required'],
            'address' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'max'=>":attribute isn't longer than :max characters",
            'min'=>":attribute isn't shorter than :min characters",
            'required'=>':attribute must require',
        ];
    }

}

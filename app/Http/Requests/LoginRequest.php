<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
            'name'=>['required','max:20','min:1'],
            'password'=>['required'],
        ];
    }
    public function messages()
    {
        return [
            '*.required'=>'Các trường :attribute phải có giá trị',
            'name.max'=>'Gia tri khong qua :max',
        ];
    }

}

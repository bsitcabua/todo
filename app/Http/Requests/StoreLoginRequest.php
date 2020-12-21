<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Validator;

class StoreLoginRequest extends FormRequest
{
    public $validator = null;

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'username'  => 'required',
            'password'  => 'required',
        ];
    }

    public function messages()
    {
        return [
            'username.required' => 'Username is required',
            'password.required' => 'Password is required',
        ];
    }

    protected function failedValidation($validator)
    {
        $this->validator = $validator;
    }
}

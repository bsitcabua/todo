<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Validator;

class UpdateItemRequest extends FormRequest
{
    public $validator = null;

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'id'            => 'required',
            'name'          => 'required',
            'deadline_date' => 'required',
            'deadline_time' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'id.required'               => 'Opps something went wrong!',
            'name.required'             => 'Todo name is required',
            'deadline_date.required'    => 'Deadline date is required',
            'deadline_time.required'    => 'Deadline time is required',
        ];
    }

    protected function failedValidation($validator)
    {
        $this->validator = $validator;
    }
}

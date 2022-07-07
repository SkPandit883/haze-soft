<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name'=>['required', 'string'],
            'department_id.*'=>['required'],
            'name'=>['required', 'string'],
            'employee_number'=>['required', 'string'],
            'email'=>['required', 'email'],
            'contact'=>['required', 'contact'],
            'designation'=>['required', 'desination']
        ];
    }
}

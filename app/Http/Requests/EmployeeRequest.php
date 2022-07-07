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
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => ['required', 'string'],
            'department_id' => ['required', 'array'],
            'name' => ['required', 'string'],
            'employee_number' => ['required', 'string'],
            'email' => ['required', 'email'],
            'contact' => ['required', 'string'],
            'designation' => ['required', 'string']
        ];
    }
    public function messages()
    {
        return [
            'department_id.required' => 'At least one deparment must be selected',
        ];
    }
}

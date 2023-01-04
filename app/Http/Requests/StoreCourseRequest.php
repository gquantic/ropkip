<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCourseRequest extends FormRequest
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
            'name' => 'required|string',
            'email' => 'required|email',
            'course_plan' => 'required|int',
            'address' => 'required|string',
            'birthdate' => 'required|date',
            'snils' => 'required|string',
            'gender' => 'required|string',
            'education_level' => 'required|string',
            'agree' => 'required|string',
        ];
    }
}

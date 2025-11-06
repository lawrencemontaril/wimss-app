<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class UpdateCourseRequest extends FormRequest
{
    /*
    | -----------------------------------------------------------
    |  Determine if the user is authorized to make this request.
    | -----------------------------------------------------------
    */
    public function authorize(): bool
    {
        return Gate::allows('update', $this->course);
    }

    /*
    | -----------------------------------------------------
    |  Get the validation rules that apply to the request.
    | -----------------------------------------------------
    */
    public function rules(): array
    {
        return [
            'name' => [
                'required',
                'string',
                'min:2'
            ],
            'code' => [
                'required',
                'string',
                Rule::unique('courses', 'code')->ignore($this->course)
            ],
            'accreditation' => [
                'required',
                'string',
                'min:2'
            ],
            'description' => [
                'nullable',
                'string',
                'min:2'
            ],
        ];
    }
}

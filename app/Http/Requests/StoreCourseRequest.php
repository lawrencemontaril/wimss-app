<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use App\Models\Course;
use Illuminate\Validation\Rule;

class StoreCourseRequest extends FormRequest
{
    /*
    | -----------------------------------------------------------
    |  Determine if the user is authorized to make this request.
    | -----------------------------------------------------------
    */
    public function authorize(): bool
    {
        return Gate::allows('create', Course::class);
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
                Rule::unique('courses', 'code')
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

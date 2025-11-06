<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class UpdateRecommendationRequest extends FormRequest
{
    /*
    | -----------------------------------------------------------
    |  Determine if the user is authorized to make this request.
    | -----------------------------------------------------------
    */
    public function authorize(): bool
    {
        return Gate::allows('update', $this->recommendation);
    }

    /*
    | -----------------------------------------------------
    |  Get the validation rules that apply to the request.
    | -----------------------------------------------------
    */
    public function rules(): array
    {
        return [
            'label' => [
                'required',
                'string',
                'min:2'
            ],
            'code' => [
                'required',
                'string',
                'min:1',
                Rule::unique('recommendations', 'code')->ignore($this->recommendation)
            ],
            'message' => [
                'required',
                'string',
                'min:2'
            ]
        ];
    }
}

<?php

namespace App\Http\Requests;

use Anik\Form\FormRequest;

class BookStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    protected function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    protected function rules(): array
    {
        return [
            'name' => 'required',
            'writer' => 'required',
            'publication' => 'required',
        ];
    }

    protected function messages(): array
    {
        return [
            'name.required' => 'The name field is required.',
            'writer.required' => 'The writer field is required.',
            'publication.required' => 'The publication field is required.',
        ];
    }
}

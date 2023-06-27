<?php

namespace App\Http\Requests\V010;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateBookRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        $user = $this->user();

        return $user != null  && $user->tokenCan('update');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        $method = $this->method();
        if ($method == 'PUT') {
            return [
                'authorLastName' => 'nullable',
                'authorFirstName' => 'required',
                'publishYear' => ['required', 'numeric', 'digits:4', 'gte:1899', 'lte:' . date('Y')],
                'title' => 'required',
                'genre' => 'required',
                'publisher' => 'required',
                'publishCity' => 'required',
                'publishState' => 'nullable',
                'publishCountry' => 'required',
                'description' => 'required',
                'isbn' => ['required', Rule::unique('books', 'isbn')],
                'stock' => 'required',
                'price' => 'required',
                'cover' => 'nullable|image|mimes:jpeg|max:2048',
            ];
        } else {
            return [
                'authorLastName' => ['sometimes', 'required'],
                'authorFirstName' => ['sometimes', 'required'],
                'publishYear' => ['sometimes', 'required', 'numeric', 'digits:4', 'gte:1899', 'lte:' . date('Y')],
                'title' => ['sometimes', 'required'],
                'genre' => ['sometimes', 'required'],
                'publisher' => ['sometimes', 'required'],
                'publishCity' => ['sometimes', 'required'],
                'publishState' => ['sometimes', 'nullable'],
                'publishCountry' => ['sometimes', 'required'],
                'description' => ['sometimes', 'required'],
                'isbn' => ['sometimes', 'required', Rule::unique('books', 'isbn')],
                'stock' => ['sometimes', 'required'],
                'price' => ['sometimes', 'required'],
                'cover' => ['sometimes', 'nullable'],
            ];
        }
    }

    protected function prepareForValidation()
    {
        $this->authorLastName ? $this->merge(['author_last_name' => $this->authorLastName]) : '';
        $this->authorFirstName ? $this->merge(['author_first_name' => $this->authorFirstName]) : '';
        $this->publishYear ? $this->merge(['publish_year' => $this->publishYear]) : '';
        $this->publishCity ? $this->merge(['publish_city' => $this->publishCity]) : '';
        $this->publishState ? $this->merge(['publish_state' => $this->publishState]) : '';
        $this->publishCountry ? $this->merge(['publish_country' => $this->publishCountry]) : '';
    }
}

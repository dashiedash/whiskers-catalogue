<?php

namespace App\Http\Requests\V010;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class StoreBookRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        $user = $this->user();

        return $user != null  && $user->tokenCan('create');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
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
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'author_last_name' => $this->authorLastName,
            'author_first_name' => $this->authorFirstName,
            'publish_year' => $this->publishYear,
            'publish_city' => $this->publishCity,
            'publish_state' => $this->publishState,
            'publish_country' => $this->publishCountry,
        ]);
    }
}

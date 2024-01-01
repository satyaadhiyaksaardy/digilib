<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBookCategoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255', 'unique:book_categories,name']
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     */
    protected function failedValidation(\Illuminate\Contracts\Validation\Validator $validator)
    {
        toast('Gagal menambahkan kategori buku. ' . $validator->errors()->first(), 'error');
        return parent::failedValidation($validator);
    }
}

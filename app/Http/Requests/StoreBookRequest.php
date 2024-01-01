<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBookRequest extends FormRequest
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
            'user_id' => ['required', 'exists:users,id'],
            'book_category_id' => ['required', 'exists:book_categories,id'],
            'title' => ['required', 'string', 'max:255', 'unique:books,title'],
            'description' => ['required', 'string'],
            'quantity' => ['required', 'integer', 'min:1'],
            'file' => ['required', 'file', 'mimes:pdf', 'max:10240'],
            'cover' => ['required', 'file', 'mimes:jpg,jpeg,png', 'max:10240'],
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     */
    protected function failedValidation(\Illuminate\Contracts\Validation\Validator $validator)
    {
        toast('Gagal memperbarui buku. ' . $validator->errors()->first(), 'error');
        return parent::failedValidation($validator);
    }
}

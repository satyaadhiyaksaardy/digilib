<?php

namespace App\Http\Requests;

use App\Models\Book;
use Illuminate\Foundation\Http\FormRequest;

class UpdateBookRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return $this->user()->can('update', $this->book);
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
            'title' => ['required', 'string', 'max:255', 'unique:books,title,' . $this->book->id],
            'description' => ['required', 'string'],
            'quantity' => ['required', 'integer', 'min:1'],
            'file' => ['nullable', 'file', 'mimes:pdf', 'max:10240'],
            'cover' => ['nullable', 'file', 'mimes:jpg,jpeg,png', 'max:10240'],
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

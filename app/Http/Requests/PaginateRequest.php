<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PaginateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'per_page' => 'nullable|integer|min:1|max:50',
        ];
    }

    public function passedValidation(): void
    {
        $this->merge([
            'per_page' => $this->per_page ?? 15,
        ]);
    }
}

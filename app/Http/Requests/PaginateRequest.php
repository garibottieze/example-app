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
            'order_by' => 'string',
            'direction_desc' => 'required_with:order_by|boolean',
            'search' => 'nullable|array|max:5',
            'search.*.by' => 'string',
            'search.*.value' => 'nullable',
            'search.*.strict' => 'required_with:search.*.value|boolean',
            'search.*.between' => 'nullable|array|size:2',
        ];
    }
}

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
            'search_by' => 'string',
            'search_value' => 'nullable',
            'strict_search' => 'required_with:search_value|boolean',
            'search_between' => 'array|size:2',
        ];
    }
}

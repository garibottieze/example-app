<?php

namespace Modules\Operators\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateOperatorRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'id' => 'required|integer|exists:operators,id',
            'full_name' => 'required',
            'internal_code' => 'required',
            'status' => 'required|in:active,inactive',
            'email' => 'required|email',
        ];
    }
}

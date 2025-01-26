<?php

namespace Modules\Operators\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class JustOperatorIdRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'id' => 'required|integer|exists:operators,id',
        ];
    }
}

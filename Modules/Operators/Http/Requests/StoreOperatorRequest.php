<?php

namespace Modules\Operators\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Hash;

class StoreOperatorRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'full_name' => 'required',
            'internal_code' => 'required|unique:operators,internal_code',
            'email' => 'required|email|unique:operators,email',
            'password' => 'required|confirmed|min:8',
        ];
    }

    protected function passedValidation(): void
    {
        $this->merge([
            'password' => Hash::make($this->password)
        ]);
    }
}

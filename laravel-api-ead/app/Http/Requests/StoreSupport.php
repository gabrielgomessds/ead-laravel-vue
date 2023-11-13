<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\Models\Support;

class StoreSupport extends FormRequest
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
    public function rules(Support $support): array
    {
        return [
            'lesson' => ['required', 'exists:lessons,id'],
            'status' => ['required', Rule::in(array_keys($support->statusOptions))],
            'description' => ['required', 'min:3', 'max:10000'],
        ];
    }
}

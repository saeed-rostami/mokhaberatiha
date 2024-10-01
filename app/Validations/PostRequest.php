<?php

namespace App\Validations;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'max:128', 'min:3'],
            'short_description' => ['nullable', 'string', 'min:3'],
            'description' => ['required', 'string', 'min:3'],
            'allow_comment' => ['bool'],
            'allow_like' => ['bool'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}

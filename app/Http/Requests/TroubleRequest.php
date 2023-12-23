<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TroubleRequest extends FormRequest
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
            'trouble.body'=>'required|string|max:500',
            'tag'=>'required',
        ];
    }
    
    public function messages()
    {
        return [
            'trouble.body.required' => '悩みは必須項目です',
            'tag.required' => 'タグは必須項目です',
        ];
    }
}

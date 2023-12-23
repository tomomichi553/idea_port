<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class IdeaRequest extends FormRequest
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
            'idea.idea_title'=>'required|sreing|max:100',
            'idea.idea_background'=>'required|string|max:500',
            'idea.idea_goal'=>'required|string|max:500',
            'idea.idea_detail'=>'required|string|max:500',
            'tag'=>'required',
        ];
    }
    
    public function messages()
    {
        return [
            'idea.idea_title.required' => 'タイトルは必須項目です',
            'idea.idea_background.required' => '背景は必須項目です',
            'idea.idea_goal.required' => '目標は必須項目です',
            'idea.idea_detail.required' => '詳細は必須項目です',
            'tag.required'=>'タグは必須項目です'
        ];
    }
    
}

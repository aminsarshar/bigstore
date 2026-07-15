<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdatePostCategoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [

            'title' => [

                'required',

                'string',

                'max:255',

                Rule::unique('post_categories')->ignore(request()->post_category),

            ],

            'slug' => [

                'nullable',

                'string',

                'max:255',

                Rule::unique('post_categories')->ignore(request()->post_category),

            ],

        ];
    }
}

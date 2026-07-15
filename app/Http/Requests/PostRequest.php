<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PostRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [

            'title' => 'required|string|max:255',

            'slug' => [
                'required',
                'string',
                'max:255',
                Rule::unique('posts', 'slug')->ignore(optional($this->route('post'))->id),
            ],

            'post_category_id' => 'required|exists:post_categories,id',

            'excerpt' => 'nullable|string',

            'body' => 'required|string',

            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',

            'seo_title' => 'nullable|string|max:255',

            'seo_description' => 'nullable|string|max:500',

            'status' => 'required|boolean',

            'is_featured' => 'nullable|boolean',

        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'عنوان الزامی است.',
            'slug.required' => 'اسلاگ الزامی است.',
            'slug.unique' => 'این اسلاگ قبلاً ثبت شده است.',
            'body.required' => 'متن مقاله الزامی است.',
            'image.image' => 'فایل باید تصویر باشد.',
            'image.max' => 'حداکثر حجم تصویر ۲ مگابایت است.',

        ];
    }
}

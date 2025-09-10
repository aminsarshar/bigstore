<?php

namespace App\Http\Requests\Admin\ProductGuarnties;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class ProductGuarantyRequest extends FormRequest
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
            'product_id'
            =>[
                'required',
                Rule::unique('product_guaranties', 'product_id')
                ->where('guaranty_id', $this->input('guaranty_id'))
                ->where('color_id', $this->input('color_id'))],
        ];
    }

    public function messages()
    {
        return [
            'product_id.unique' => 'برای این محصول با همین مشخصات رنگ و گرانتی ثبت شده است'
        ];
    }

}
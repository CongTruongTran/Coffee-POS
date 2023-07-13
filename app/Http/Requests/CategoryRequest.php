<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name_category' => 'required',
            'des_category' => 'required'
        ];
    }

    public function messages()
    {
        return[
            'name_category.required' => 'Tên danh mục không được bỏ trống',
            'des_category.required' => 'Mô tả không được bỏ trống'
        ];
    }
}

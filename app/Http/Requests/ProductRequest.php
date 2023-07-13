<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'name_product' => 'required',
            'price_product' => 'required|integer',
            'categories' => ['integer', function($attribute, $value, $fail){
                if($value==0){
                    $fail('Vui lòng chọn danh mục');
                }
            }],
            'unit_product' => 'required',
            'thumbnail' => 'required',
            'des_product' =>'required'
        ];
    }

    public function messages()
    {
        return[
            'name_product.required' => 'Tên sản phẩm không được bỏ trống',
            'price_product.required' => 'Giá không được bỏ trống',
            'price_product.integer' => 'Giá phải là số',
            // 'categories.required' => 'Danh mục không được bỏ trống',
            'unit_product.required' => 'Đơn vị tính không được bỏ trống',
            'thumbnail.required' => 'Hình ảnh không được bỏ trống',
            'des_product.required' => 'Mô tả không được bỏ trống',
        ];
    }

}

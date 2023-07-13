<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WarehouseRequest extends FormRequest
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
            'name' => ['integer', function($attribute, $value, $fail){
                if($value==0){
                    $fail('Vui lòng chọn nguyên liệu nhập');
                }
            }],
            "price" => 'required',
            "quantity" => 'required',
            "status" => 'required'
        ];
    }

    public function messages()
    {
        return[
            // 'name.required' => 'Tên không được bỏ trống',
            'price.required' => 'Giá không được bỏ trống',
            'quantity.required' => 'Số lượng không được bỏ trống',
            'status.required' => 'Tình trạng không được bỏ trống'
        ];
    }
}

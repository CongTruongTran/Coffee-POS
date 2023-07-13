<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SupplierRequest extends FormRequest
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
            "name_supplier" => 'required',
            "addr_supplier" => 'required',
            "phone_supplier" => 'required|min:8',
            "email_supplier" => 'required|email'
        ];
    }

    public function messages()
    {
        return[
            'name_supplier.required' => 'Tên không được bỏ trống',
            'addr_supplier.required' => 'Địa chỉ không được bỏ trống',
            'phone_supplier.required' => 'Số điện thoại không được bỏ trống',
            'phone_supplier.min' => 'Số điện thoại phải dài hơn 9 số',
            'email_supplier.required' => 'Email không được bỏ trống',
            'email_supplier.email' => 'Email phải đúng định dạng'
        ];
    }
}

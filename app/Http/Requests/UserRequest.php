<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
        // $uniquePhone = 'unique:thongtinnv';

        // if(session('idTTNV')){
        //     $idTTNV = session('idTTNV');
        //     $uniquePhone = 'unique:thongtinnv,SĐTh,'.$idTTNV;
        // }   

        return[
            'name' => 'required',
            'email' => 'required|email|',
            'SĐTh' => 'required|',
            // 'created' => 'required',
            'position' => ['required', function($attribute, $value, $fail){
                if($value==0){
                    $fail('Vui lòng chọc chức vụ');
                }
            }],
            'addr' => 'required',
            'sex' => ['required', function($attribute, $value, $fail){
                if($value==0){
                    $fail('Vui lòng chọn giới tính');
                }
            }],
            'thumbnail' => 'required'
        ];
        
    }

    public function messages()
    {
        return [
            'name.required' => 'Tên không được bỏ trống',
            'email.required' => 'Email không được bỏ trống',
            'email.email' => 'Email phải đúng định dạng',
            'SĐTh.required' => 'Số điện thoại không được bỏ trống',
            'SĐTh.unique' => 'Số điện thoại đã tồn tại trên hệ thống',       
            'addr.required' => 'Địa chỉ không được bỏ trống',
            'thumbnail.required' => 'Thêm hình ảnh của bạn',
        ];  
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
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
            //
            'ho_ten' => 'required|min:4',
            'email' => 'required|email',
            'dien_thoai' => 'required',
            'dia_chi' => 'required'
        ];
    }

    public function messages(){
        return [
            //
            'ho_ten.required' => 'Vui lòng nhập họ tên người nhận',
            'ho_ten.min' => 'Có tên này hả ta???',
            'email.required' => 'Vui lòng nhập email',
            'email.email' => 'Email không hợp lệ',
            'dien_thoai.required' => 'Vui lòng nhập số điện thoại, để khi cần tui gọi',
            'dia_chi.required' => 'Không nhập địa chỉ nghỉ giao nhé'
        ];
    }
}

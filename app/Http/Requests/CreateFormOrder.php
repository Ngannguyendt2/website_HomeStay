<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateFormOrder extends FormRequest
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
            'phone' => 'required', 'regex:/^(0|\+84)(\s|\.)?((3[2-9])|(5[689])|(7[06-9])|(8[1-689])|(9[0-46-9]))(\d)(\s|\.)?(\d{3})(\s|\.)?(\d{3})$/',
            'checkin' => 'required|after:today',
            'checkout' => 'required|after:checkin'
        ];
    }
    public function messages()
    {
        return [
            'phone.required'=>'số điện thoại không được để trống',
            'checkin.required'=>'ngày checkin không được để trống ',
            'checkin.after'=>'ngày checkin phải sau ngày hôm nay ',
            'checkout.required'=>'ngày checkout không được để trống',
            'checkout.after'=>'ngày checkout phải sau ngày checkin ',

        ];
    }
}

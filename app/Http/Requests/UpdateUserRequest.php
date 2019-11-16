<?php

namespace App\Http\Requests;

use App\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class UpdateUserRequest extends FormRequest
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
            'name' => 'required|min:5|max:50',
            'phone' => ['required', 'regex:/^(0|\+84)(\s|\.)?((3[2-9])|(5[689])|(7[06-9])|(8[1-689])|(9[0-46-9]))(\d)(\s|\.)?(\d{3})(\s|\.)?(\d{3})$/', Rule::unique('users')->ignore(Auth::user()->id),],
            'address' => 'required|min:5',
            'image' => 'mimes:jpeg,bmp,png'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Vui lòng nhập tên đầy đủ',
            'name.min' => 'Tên phải lớn hơn 5 ký tự',
            'name.max' => 'Tên không quá 50 ký tự',
            'phone.required' => 'Vui lòng không để trống số điện thoại',
            'phone.regex' => 'số điện thoại không đúng',
            'address.required' => 'Vui lòng nhập địa chỉ',

        ];
    }
}

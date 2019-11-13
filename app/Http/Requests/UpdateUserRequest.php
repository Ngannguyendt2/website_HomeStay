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
            'phone' => ['required', Rule::unique('users')->ignore(Auth::user()->id),],
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
            'address.required' => 'Vui lòng nhập địa chỉ',

        ];
    }
}

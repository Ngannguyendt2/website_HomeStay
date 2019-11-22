<?php

namespace App\Http\Requests;

use App\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class UpdatePasswordRequest extends FormRequest
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
            'old_password' => 'required',
            'new_password' => 'min:6|required_with:password_confirmation|same:password_confirmation',
            'password_confirmation'=>'min:6'
        ];
    }

    public function message()
    {
        return [
            'old_password.required' => 'Mật khẩu cũ không được để trống',
            'new_password.min' => 'Mật khẩu ít nhất 6 ký tự',
            'new_password.required_with' => 'Yêu cầu xác nhận mật khẩu',
            'new_password.same' => 'Mật khẩu xác nhận phải giống nhau',
            'password_confirmation' => 'Mật khẩu ít nhất 6 ký tự',
        ];


    }
}

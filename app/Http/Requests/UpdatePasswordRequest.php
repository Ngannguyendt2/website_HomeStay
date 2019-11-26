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
            'password_confirmation' => 'min:6'
        ];
    }

    public function messages()
    {
        return [
            'old_password.required' => 'mật khẩu cũ không để trống',
            'new_password.required' => 'mật khẩu mới không để trống ',
            'new_password.min' => 'mật khẩu không dưới 6 ký tự ',
            'password_confirmation.min' => 'mật khẩu không dưới 6 ký tự ',
            'new_password.same' => 'mật khẩu nhập lại và mật khẩu mới phải giống nhau'


        ];
    }
}

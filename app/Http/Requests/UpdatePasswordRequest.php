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
            'password' => 'required|min:6|max:50',
        ];
    }

    public function message()
    {
        return [
            'password.required' => 'Không để trống mật khẩu',
            'password.min' => 'Mật khẩu phải lớn hơn 6 ký tự',
            'password.max' => 'Mật khẩu không quá 50 ký tự',

        ];
    }
}

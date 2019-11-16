<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateHouseRequest extends FormRequest
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
            'name'=>'required',
            'address'=>'required|min:5',
            'totalBedRoom'=>'required',
            'totalBathRoom'=>'required',
            'description'=>'required',
            'price'=>'required',
            'status'=>'required',
            'image'=>'mimes:jpeg,bmp,png',
            'category_id'=>'required',
            'user_id'=>'required'
        ];
    }

}

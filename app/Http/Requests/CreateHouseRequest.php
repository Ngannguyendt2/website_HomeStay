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
            'demand'=>'required',
            'name'=>'required',
            'province' => 'required',
            'district' => 'required',
            'ward' => 'required',
            'name_way' => 'required',
            'house_number' => 'required',
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
    public function messages()
    {
        return [
            'demand.required' => 'Vui lòng chọn nhu cầu',
            'name.required' => 'Tên nhà không được để trống',
            'province.required' => 'Thành phố không được để trống',
            'district.required' => 'Quận huyện không được để trống',
            'ward.required' => 'Xã phường không được để trống',
            'name_way.required' => 'Đường không được để trống',
            'house_number.required' => 'Số nhà không được để trống',
            'description.required' => 'Tạo mô tả cho nhà của bạn',
            'totalBedRoom.required' => 'Số phòng ngủ không để trống',
            'totalBathRoom.required' => 'Số phòng tắm không được để trống',
            'price.required' => 'Nhấp giá cho thuê',
            'category_id.required' => 'Chọn loại nhà bạn muốn cho thuê'
        ];
    }
}

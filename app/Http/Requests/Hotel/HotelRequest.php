<?php

namespace App\Http\Requests\Hotel;

use Illuminate\Foundation\Http\FormRequest;

class HotelRequest extends FormRequest
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
            'hotel_name'=>'required',
            'hotel_type'=>'required',
            'rank_star'=>'required',
            'city'=>'required',
            'township'=>'required',
            'street'=>'required',
            'hotel_phone'=>'required',
        ];
    }
}

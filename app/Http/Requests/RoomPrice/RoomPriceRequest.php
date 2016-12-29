<?php

namespace App\Http\Requests\RoomPrice;

use Illuminate\Foundation\Http\FormRequest;

class RoomPriceRequest extends FormRequest
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
                     'first_hours'=>'required', 
                     'second_hours'=>'required', 
                     'third_hours'=>'required', 
                     'day_price'=>'required',
                    'roomtype_id'=>'required',
        ];
    }
}

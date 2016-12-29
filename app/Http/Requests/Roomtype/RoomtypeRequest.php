<?php

namespace App\Http\Requests\Roomtype;

use Illuminate\Foundation\Http\FormRequest;

class RoomtypeRequest extends FormRequest
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
             'roomtype_name'=>'required',
              'roomtype_quantity'=>'required',
              'guest_count'=>'required',
              'bed_count'=>'required',
              'roomtype_picture'=>'required |image ',
              'area'=>'required',
              'direct'=>'required',
              'bed_type'=>'required',
              'hotel_id'=>'required',
        ];
    }
}

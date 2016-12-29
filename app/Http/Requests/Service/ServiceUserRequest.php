<?php

namespace App\Http\Requests\Service;

use Illuminate\Foundation\Http\FormRequest;

class ServiceUserRequest extends FormRequest
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
            'service_quantity' =>'required',
            'service_id' =>'required',
            'room_id' =>'required',
            'hotel_id' =>'required',
        ];
    }
}

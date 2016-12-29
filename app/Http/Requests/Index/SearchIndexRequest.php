<?php

namespace App\Http\Requests\Index;

use Illuminate\Foundation\Http\FormRequest;

class SearchIndexRequest extends FormRequest
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
            'city'=>'required | min:5',
            'checkin'=>'required',
            'checkout'=>'required'
        ];
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddressStoreRequest extends FormRequest
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
    * get the error messages that apply to the request.
    *
    * @return array
    */

    public function message()
    {
        return [
            'street.required' => 'street is required',

            'city.required' => 'city is required',
            // 'city.alpha' => 'city must conatain only alphabets',

            'state.required' => 'state is required',
            'state.alpha' => 'state must conatain only alphabets',

            'pincode.required' => 'pincode is required',
            'pincode.numeric' => 'pincode should be numeric',
            'pincode.digits' => 'pincode should be of length 9',

            'phone_number.required' => 'phone number is required',
            'phone_number.numeric' => 'phone_number should be numeric',
            'phone_number.digits' => 'phone_number should be of length 9',
        ];
    }



    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'street' => 'required',
            'city' => 'required',
            'state' => 'required|alpha',
            'pincode' => 'required|numeric|digits:6',
            'phone_number' => 'required|numeric|digits:10',
        ];
    }
}

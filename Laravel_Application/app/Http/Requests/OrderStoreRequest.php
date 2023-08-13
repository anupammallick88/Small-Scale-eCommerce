<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderStoreRequest extends FormRequest
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
     * Get the messages for failed validations
     *
     * @return array
     */


    public function message()
    {
        return [
            'address_id.required' => 'please pass addressId',
            'address_id.numeric' => 'Address_id must be numeric',
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
            'address_id' => 'required|numeric'
        ];
    }
}

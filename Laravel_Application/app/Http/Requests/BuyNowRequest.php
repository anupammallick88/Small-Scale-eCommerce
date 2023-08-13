<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BuyNowRequest extends FormRequest
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


    public function message()
    {
        return [
            'product_id.required' => 'please enter quantity.',
            'product_id.numeric' => 'please pass a number.',
            'product_id.exists' => 'product Id doesn\'t exist.',

            'address_id.required' => 'please enter quantity.',
            'address_id.numeric' => 'please pass a number.',
            'address_id.exists' => 'address Id doesn\'t exist.',
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
            'product_id' => 'required|numeric|exists:products,id',
            'address_id' => 'required|numeric|exists:addresses,id',
        ];
    }
}

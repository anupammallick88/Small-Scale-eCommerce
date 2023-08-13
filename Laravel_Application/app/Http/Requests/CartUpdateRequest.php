<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CartUpdateRequest extends FormRequest
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
            'quantity.required' => 'please enter quantity.',
            'quantity.min' => 'quantity should be greater or equal than 1.'
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
            'quantity' => 'required|min:1'
        ];
    }
}

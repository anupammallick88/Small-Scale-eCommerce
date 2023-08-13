<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
     * Get the validation message that apply to the request.
     *
     * @return array
     */
    public function message()
    {
        return [
            'name.required' => 'please enter the name',
            'name.alpha' => 'please enter a valid name',

            'email.required' => 'please enter email address',
            'email.email' => 'please enter valid email address',
            'email.unique' => 'Email already registered',

            'password.required' => 'please enter password',
            'password.confirmed' => 'confirmation password doesn\'t match',
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
            'name' => 'required|alpha',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed'
        ];
    }
}

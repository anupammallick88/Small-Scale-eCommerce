<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductStoreRequest extends FormRequest
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
            'title.required' => 'Title is required',

            'description.required' => 'Description is required',

            'cost.required' => 'Cost is required',
            'cost.numeric' => 'Cost should be neumeric',

            'category_id.required' => 'Please select a category',
            'category_id.numeric' => 'category Id sgould be numeric',
            'category_id.exists' => 'Please select a valid category',
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
            'title' => 'required',
            'description' => 'required',
            'cost' => 'required|numeric',
            'category_id' => 'required|numeric|exists:categories,id',
        ];
    }
}

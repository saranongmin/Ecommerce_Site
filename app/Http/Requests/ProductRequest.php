<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'title' => ['required','min:3','max:5', 'unique:products'],
            'description' => ['required','max:500'],
            'is_active'=>['required'],
        ];
    }

   public function messages()
   {
       return [
           'title.required' => 'A Product Title is required',
           'title.min' => 'Title',
           'description.required' => 'Product Description is required',
       ];
   }

    public function attributes()
    {
        return [
            'title' => 'Product Name',
            'description' => 'Product Description',
        ];
    }
}


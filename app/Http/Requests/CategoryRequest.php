<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
            'title' => ['required','min:3','max:55', 'unique:categories'],
            'description' => ['required','max:500'],
            
        ];
    }

   public function messages()
   {
       return [
           'title.required' => 'A Product Title is required',
           'title.min' => 'Minimum test',
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

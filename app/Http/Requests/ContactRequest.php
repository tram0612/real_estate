<?php

namespace App\Http\Requests;
use Illuminate\Support\Facades\URL;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
                'name' => 'required',
                'email' => 'required|email',

            ];
        
        
    }
    public function messages()
    {
        
            return [
                'name.required' => 'Vui lòng nhập học tên',
                'email.required' => 'Vui lòng nhập email',
                'email.email' => 'Vui lòng nhập email',
                

            ];
        
        
    }
}

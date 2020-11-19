<?php

namespace App\Http\Requests;
use Illuminate\Support\Facades\URL;
use Illuminate\Foundation\Http\FormRequest;

class CatRequest extends FormRequest
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
        $uri = URL::current();

        if(strpos($uri,'add') !== false){
            return [
                'name' => 'required|unique:cat,name',
            ];
        }
        else{
            $tmp = explode('/',$uri);
            $id = end($tmp);
            return [
                'name' => 'required|unique:cat,name,'.$id.',cat_id',
            ];
        }
    }
    public function messages()
    {
        return [
            'name.required' => 'Vui lòng nhập tên danh mục',
            'name.unique' => 'Tên danh mục đã bị trùng.Vui lòng nhập lại',
            
        ];
    }
}

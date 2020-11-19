<?php

namespace App\Http\Requests;
use Illuminate\Support\Facades\URL;
use Illuminate\Foundation\Http\FormRequest;

class NewsRequest extends FormRequest
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
                'name' => 'required|unique:news,name',
                'picture' => 'required|mimes:jpeg,jpg,bmp,png',
                'cat' => 'required',
                'content' => 'required',
                'rate' => 'nullable|numeric',
                'dien_tich' => 'required',
                'dia_chi'  =>  'required',


            ];
        }else{

            $tmp=explode('/',$uri);
            $id=end($tmp);
            return [
                'name' => 'required|unique:news,name,'.$id.',news_id',
               
            ];
            
        }
    }
    public function messages()
    {
        $uri = URL::current();
        if(strpos($uri,'add') !== false){

            return [
                'name.required' => 'Vui lòng nhập tên tin',
                'name.unique' => 'Tên tin đã bị trùng.Vui lòng nhập lại',
                'picture.required' => 'Vui lòng chọn ảnh',
                'picture.mimes' => 'Vui lòng chọn ảnh',
                'cat.required' => 'Vui lòng chọn danh mục',
                'content.required' => 'Vui lòng nhập chi tiết',
                'counter.numeric' => 'Vui lòng nhập số',
               
                'rate.numeric' =>'Vui lòng nhập số',
                'dien_tich.required' => 'Vui lòng nhập diện tích',
                'dia_chi.required' => 'Vui lòng nhập địa chỉ',
            ];
        }else{
            
            return [
                'name.required' => 'Vui lòng nhập tên tin',
                'name.unique' => 'Tên tin đã bị trùng.Vui lòng nhập lại',
               
            ];
            
        }
            
    }

}

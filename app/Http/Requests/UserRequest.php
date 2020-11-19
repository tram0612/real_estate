<?php

namespace App\Http\Requests;
use Illuminate\Support\Facades\URL;
use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
        if(strpos($uri,'add')!==false){
            return [
                
                'username' => 'required|unique:users,username|min:3',
                'email' => 'required|email',
                'password' => 'required|max:20|min:3',
                'passwordconfirm' => 'required|same:password',
                'role' =>'required',
            ];
        }
        elseif(strpos($uri,'register')!==false)
        {
            return [
                
                'username' => 'required|unique:users,username|min:3',
                'email' => 'required|email',
                'password' => 'required|max:20|min:3',
                'passwordconfirm' => 'required|same:password',
                
            ];
        }
        elseif(strpos($uri,'cland.vn/edit')!==false){
            $tmp = explode('/', $uri);
            $username = end($tmp);
            return [
                
                'username' => 'required|min:3|unique:users,username,'.$username.',username',
               
                'password' => 'nullable|max:20|min:3',
                'passwordconfirm' => 'same:password',
                
            ];
        }
        else{
            $tmp = explode('/', $uri);
            $id = end($tmp);
            return [
               
                'username' => 'required|min:3|unique:users,username,'.$id.',id',
                'password' => 'required|max:20|min:3',
                'passwordconfirm' => 'required|same:password',
                
            ];
        }
    }
    public function messages()
    {
        $uri = URL::current();
        if(strpos($uri,'add')!==false || strpos($uri,'register')!==false){
            return [
                
                'username.required' => 'Vui lòng nhập username ',
                'username.unique' => 'Tên username bị trùng.Vui lòng nhập lại!',
                'username.min' => 'Vui lòng nhập trên 3 kí tự',
                'email.required' => 'Vui lòng nhập email',
                'email.email' => 'Vui lòng nhập email đúng',
                'password.required'  => 'Vui lòng nhập password',
                'passwordconfirm.required' =>'Vui lòng xác nhận password',
                'passwordconfirm.same' =>'Password không khớp',
                'role.required'=> 'Vui lòng chọn chức năng',
            ];
        }
        else{
            return [

                'username.required' => 'Vui lòng nhập username ',
                'username.unique' => 'Tên username bị trùng.Vui lòng nhập lại!',
                'username.min' => 'Vui lòng nhập trên 3 kí tự',
                'password.required'  => 'Vui lòng nhập password',
                'passwordconfirm.required' =>'Vui lòng xác nhận password',
                'passwordconfirm.same' =>'Password không khớp',
               
            ];
        }
        
    }
}

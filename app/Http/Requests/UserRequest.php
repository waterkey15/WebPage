<?php


namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
          'name' => 'required|max:90|min:2|string' ,
          'email' => 'required|max:200|min:10|unique:users',
          'password'=>'required|max:50|min:6'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Name field is required' ,
            'name.max' =>'name field contains no more than 90 words',
            'name.min' => 'name field contains more than 2 chars',
            'name.string' => 'name area should be a string'
        ];
    }


}

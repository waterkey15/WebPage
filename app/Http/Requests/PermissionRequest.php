<?php


namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PermissionRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
          'name' => 'required|max:90|min:10|string|unique:permissions' ,
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Name field is required' ,
            'name.max' =>'name field contains no more than 90 words',
            'name.min' => 'name field contains more than 10 chars',
            'name.string' => 'name area should be a string'
        ];
    }


}

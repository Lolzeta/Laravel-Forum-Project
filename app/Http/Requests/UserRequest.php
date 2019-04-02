<?php

namespace App\Http\Requests;

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
        return [
            'name'      => 'alpha|max:255|min:5',
            'email'     => 'email',
            'password'  => 'sometimes|nullable|min:6|alpha_num|confirmed', 
        ];
    }

    public function messages()
    {
        return [
            'name.alpha'         =>  'The :attribute need to be alphabetic',
            'name.max'           =>  'The :attribute has 255 characters limit',
            'name.min'           =>  'The :attribute need to have six characters or more',
            'email.email'        =>  'The :attribute need to be like: email@example.ex',
            'password.min'       =>  'The :attribute need to have six characters or more',
            'password.alpha_num' =>  'The :attribute need to be alphanumeric',
            'password.confirmed' =>  'The :attribute need to be the same'
        ];
    }

    public function attributes(){
        return [
            'name'      =>  'username',
            'email'     =>  'user email',
            'password'  =>  'user password',
        ];
    }
}

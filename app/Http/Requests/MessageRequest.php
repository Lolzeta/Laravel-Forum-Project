<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MessageRequest extends FormRequest
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
          'message'                        =>      'required|min:3'
        ];
    }

    public function messages(){
      return[
      'message.required'            =>      'The :attribute need text',
      'message.min'                 =>      'The :attribute need to have three characters or more'
      ];
    }

    public function attributes(){
      return [
      'message'     =>    'message'
    ];
    }
}

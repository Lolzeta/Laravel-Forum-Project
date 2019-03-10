<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CommunityRequest extends FormRequest
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
          'name'                        =>      'required|min:3',
          'description'                 =>      'required|min:10',
          'aka'                         =>      'required'
        ];
    }

    public function messages(){
      return[
      'name.required'               =>      'The :attribute is needed',
      'name.min'                    =>      'The :attribute need to have three characters or more',
      'description.required'        =>      'The :attribute is needed',
      'description.min'             =>      'The :attribute need to have ten characters or more',
      'aka.required'                =>      'The :attribute is needed'
      ];
    }

    public function attributes(){
      return [
      'name'        =>    'community name',
      'description' =>    'community description',
      'aka'         =>    'also known as'
    ];
    }
}

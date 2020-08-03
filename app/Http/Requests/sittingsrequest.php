<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class sittingsrequest extends FormRequest
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
          'phone'=>'required|',
          'email'=>'required|',
          'card_number'=>'required|',
          'description'=>'required|',
          'terms'=>'required|',
          

      ];
    }
    public function messages(){
      return
      [
      'phone.required'=>'هذا الحقل مطلوب',
      'name.min'=>'يجب الا يقل الاسم عن ثلاثة احرف'
    ];
    }
}

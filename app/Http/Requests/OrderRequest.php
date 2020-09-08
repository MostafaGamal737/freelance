<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
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
          'client_phone'=>'min:7|numeric',
          'provider_phone'=>'min:7|numeric',
          'duration'=>'numeric',
          'price'=>'numeric',

      ];
    }

    public function messages(){
      return
      [
      'client_phone.numeric'=>'يجب الا يقل الرقم عن 7 ارقام',
      'client_phone.min'=>'يجب ان يكون المدخل رقم فقط',
      'provider_phone.min'=>'يجب الا يقل الرقم عن 7 ارقام',
      'provider_phone.numeric'=>'يجب ان يكون المدخل رقم فقط',
      'duration.numeric'=>'يجب ان يكون المدخل رقم فقط',
      'price.numeric'=>'يجب ان يكون المدخل رقم فقط'
    ];
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ubdaterequest extends FormRequest
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
           'name'=>'max:20|min:6',
           'phone'=>'min:7|numeric',
           'password'=>'nullable|min:6|max:16',

         ];
     }
     public function messages(){
       return[
         'name.required'=>'يجمب ادخال الاسم كامل',
         'name.min'=>'يجب الايقل الاسم عن 6 احرف',
         'phone.numeric'=>'يجب الا يقل رقم الجوال عن 7 ارقام',
         'phone.min'=>'الجوال يجب ان يكون ارقام فقط',
         'password.min'=>'يجب الا تقل كلمة السر عن 6 احرف',
       ];
     }
}

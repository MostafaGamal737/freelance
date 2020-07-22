<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class rolesValidation extends FormRequest
{
     public function authorize()
     {
         return true;
     }

     public function rules()
     {
         return [
             'name'=>'required|min:3',

         ];
     }
     public function messages(){
       return
       [
       'name.required'=>'هذا الحقل مطلوب',
       'name.min'=>'يجب الا يقل الاسم عن ثلاثة احرف'
     ];
     }
}

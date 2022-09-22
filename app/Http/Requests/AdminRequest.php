<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminRequest extends FormRequest
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
            'name'=>['required','max:255'],
            'email'=>['required','email','unique:admins,email'],
            'password'=>['required'],
            'phone'=>['required'],

        ];
    }
    public function messages()
    {
        return [
            'name.required'=> 'يجب ادخال الاسم ',
            'name.max'=> 'اقصى دد حروف هو 255 حرف',
            'email.required'=> 'البريد الإلكتروني مطلوب',
            'email.email'=> 'يجب ان يكون ايميل صحيح',
            'email.unique'=> 'عذرا يوجد ايميل مسجل مسبقا بهذا الاسم',
            'password.required' => 'برجاء ادخال الرقم السري',
            'phone.required' => 'برجاء ادخال رقم الهاتف'
        ];
    }
}

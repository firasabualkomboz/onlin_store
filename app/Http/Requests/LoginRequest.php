<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // return false;
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
            'email' => 'required|email',
            'password' => 'required',
        ];
    }

    public function messages()
    {
        return [
     'email.required' => 'بليز الايميل مطلوب يبشه ',
     'email.email' => 'اكتب ايميل صالج يبشه ، طيب مش سعيد ؟ ',
     'password.required' => 'ايييه يبشه كلمة المرور يبشه '
        ];
    }

}

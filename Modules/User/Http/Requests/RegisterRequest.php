<?php

namespace Modules\User\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {

        return [
            'name' => ['required','string'],
            'mobile' => ['required','regex:/^(09)\d{9}$/i','digits:11','numeric','unique:users,mobile'],
            'password' => ['required','string'],
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    public function attributes()
    {
        return [
            'mobile' => 'شماره موبایل',
            'name' => 'نام',
            'password' => 'کلمه عبور'
        ];
    }

    public function messages()
    {
        return [
            'mobile.unique' => 'شما قبلا ثبت نام کرده‌اید.',
        ];
    }

}

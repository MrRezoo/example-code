<?php

namespace Modules\User\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OtpCheckRegisterRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'code' => ['required','exists:user_sms_queue,code','numeric','digits:5'],
            'name' => 'required',
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
            'code' => 'کد تائيدیه',
            'name' => 'نام',
        ];
    }
}

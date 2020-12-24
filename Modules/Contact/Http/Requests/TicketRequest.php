<?php

namespace Modules\Contact\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TicketRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'subject' => ['required', 'string'],
            'message' => ['required', 'string'],
            'status' => ['required', 'boolean'],
            'priority_id' => ['nullable', 'exists:priority,id'],
            'department_id' => ['nullable', 'exists:department,id'],
            'parent_id' => ['nullable', 'exists:ticket,id']
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
            'subject' => 'عنوان',
            'message' => 'متن پیام',
            'status' => 'وضعیت',
            'priority_id' => 'اولویت',
            'department_id' => 'دپارتمان',
            'parent_id' => 'پیام اصلی'
        ];
    }
}

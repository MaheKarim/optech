<?php

namespace Modules\ContactMessage\App\Http\Requests;

use App\Rules\Captcha;
use Illuminate\Foundation\Http\FormRequest;

class ContactMessageRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules()
    {
        $rules = [
            'name'=>'required',
            'email'=>'required',
            'phone'=>'nullable',
            'message'=>'required',
            'g-recaptcha-response'=>new Captcha()
        ];

        return $rules;
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

    public function messages(): array
    {
        return [
            'name.required' => trans('translate.Name is required'),
            'email.required' => trans('translate.Email is required'),
            'phone.nullable' => trans('translate.Phones is nullable'),
            'message.required' => trans('translate.Message is required')
        ];
    }
}

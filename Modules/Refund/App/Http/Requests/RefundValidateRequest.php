<?php

namespace Modules\Refund\App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RefundValidateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'note' => 'required|max:255',
            'order_id' => 'required'
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    public function messages(): array
    {
        return [
            'note.required' => trans('translate.Reason is required'),
            'order_id.required' => trans('translate.Order is required'),
            
        ];
    }
}

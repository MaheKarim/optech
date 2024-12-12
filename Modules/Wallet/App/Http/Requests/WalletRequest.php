<?php

namespace Modules\Wallet\App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WalletRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'amount' => 'required|min:10|numeric',
            'payment_gateway' => 'required'
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
            'payment_gateway.required' => trans('translate.Payment gateway is required'),
            'amount.required' => trans('translate.Amount is required'),
            'amount.min' => trans('translate.You have to add minimum 10 USD'),
            'amount.numeric' => trans('translate.Please provide numeric value'),
            
        ];
    }
}

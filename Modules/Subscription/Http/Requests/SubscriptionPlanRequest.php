<?php

namespace Modules\Subscription\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SubscriptionPlanRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [
            'plan_name' => 'required',
            'plan_price' => 'required|numeric',
            'expiration_date' => 'required',
            'serial' => 'required|numeric',
            'max_listing' => 'required|numeric',
            'featured_listing' => 'required|numeric',
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
            'plan_name.required' => trans('translate.Plan name is required'),
            'plan_price.required' => trans('translate.Plan price is required'),
            'plan_price.numeric' => trans('translate.Plan price should be numeric'),
            'expiration_date.required' => trans('translate.Expiration date is required'),
            'serial.required' => trans('translate.Serial is required'),
            'featured_listing.required' => trans('translate.Featured listing is required'),
            'max_listing.required' => trans('translate.Max listing is required')

        ];
    }
}

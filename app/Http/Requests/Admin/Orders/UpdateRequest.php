<?php

namespace App\Http\Requests\Admin\Orders;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'FN' => 'required|string',
            'phone' => 'required|string',
            'status' => 'required|integer',
            'service' => 'required|integer',
            'order_number' => '',
            'order_phone' => '',
        ];
    }
}

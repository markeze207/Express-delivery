<?php

namespace App\Http\Requests\Markets\Ozon;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'service' => 'required|integer',
            'FN' => 'required|string',
            'phone' => 'required|string',
            'qr_photo' => 'required|file',


        ];
    }
}

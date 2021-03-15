<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateOrder extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'contact_id' => 'required|exists:contacts,id',
            'uuid'       => 'required|min:6|unique:orders',
            'price'      => 'required',
            'item'       => 'required|min:2',
        ];
    }
}

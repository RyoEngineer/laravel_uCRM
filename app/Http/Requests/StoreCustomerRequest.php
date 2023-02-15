<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCustomerRequest extends FormRequest
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
            'name'     => ['required', 'max:50'],
            'kana'     => ['required', 'max:50', 'regex:/^[ァ-?]+$'],
            'tel'      => ['required','digits_between:10,11', 'unique:customers.tel'],
            'email'    => ['required', 'max:50', 'email', 'unique:customers.email'],
            'postcode' => ['required', 'max:7'],
            'address'  => ['required', 'max:50'],
            'birthday' => ['nullable','date'],
            'gender'   => ['required', 'integer', 'min:0' ,'max:2'],
            'memo'     => ['max:50'],
        ];
    }
}

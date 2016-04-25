<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class AbuseValidator extends Request
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
     * @return array
     */
    public function rules()
    {
        return [
            'first_name' => 'required',
            'last_name'  => 'required',
            'address'    => 'required',
            'city'       => 'required',
            'state'      => 'required',
            'postcode'   => 'required',
            'country'    => 'required',
            'email'      => 'required|email',
            'phone'      => 'required',
            'mobile'     => 'required',
            'type'       => 'required'
        ];
    }
}

<?php

namespace App\Http\Requests\Client;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use App\Http\Requests\BaseRequest;

class LoginRequest extends BaseRequest
{
    public function prepareForValidation()
    {
        $this->merge([
            'phone' => str_replace(' ', '', $this->phone),
        ]);
    }

    public function rules(): array
    {
        return [
            'phone' => ['required',Rule::exists('clients')->where(function ($query){
                return $query->where('phone', request('phone'))->where('type_id', request('type_id')) ->where('phone_code', request('phone_code'));
            })],
            'password' => ['required'],
            'phone_code'    =>  ['required'],
            'type_id'    =>  ['required','exists:types,id'],
        ];
    }
    
}
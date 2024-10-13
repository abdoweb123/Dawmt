<?php

namespace Modules\Contact\Http\Requests;

use App\Http\Requests\API\BaseRequest;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class ContactRequest extends BaseRequest
{
    public function rules()
    {
        return [
            'name' => ['required'],
            'phone' => ['required'],
            'phone_code' => ['required'],
            'email' => ['required'],
            'subject' => ['required'],
            'message' => ['required'],
            'device_token'    =>  ['nullable'],
        ];
    }
}

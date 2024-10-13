<?php

namespace App\Http\Requests\Client;

use Illuminate\Foundation\Http\FormRequest;

class StatisticRequest extends FormRequest
{
    public function rules()
    {
        $rules = [
            'number' => 'required|string|max:255',
            'title_ar' => 'required|string|max:255',
            'title_en' => 'required|string|max:255',
            'desc_ar' => 'required|string|max:255',
            'desc_en' => 'required|string|max:255',
        ];

        return $rules;
    }

}

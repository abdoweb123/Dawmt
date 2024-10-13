<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class JobRequest extends FormRequest
{
    public function rules()
    {
        return [
            'title_ar' => 'required|string',
            'title_en' => 'required|string',
            'general_desc_ar' => 'required|string',
            'general_desc_en' => 'required|string',
            'desc_ar' => 'required|string',
            'desc_en' => 'required|string',
            'employment_type_ar' => 'required|string',
            'employment_type_en' => 'required|string',
            'work_place_type_ar' => 'required|string',
            'work_place_type_en' => 'required|string',
            'salary_ar' => 'required|string',
            'salary_en' => 'required|string',
            'experience_required_ar' => 'required|string',
            'experience_required_en' => 'required|string',
            'location_ar' => 'required|string',
            'location_en' => 'required|string',
        ];
    }
}

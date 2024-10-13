<?php

namespace App\Http\Requests\Client;

use Illuminate\Foundation\Http\FormRequest;

class ModuleRequest extends FormRequest
{
    public function rules()
    {
        $rules = [
            'title_ar' => 'required|string|max:255',
            'title_en' => 'required|string|max:255',
            'desc_ar' => 'required|string|max:255',
            'desc_en' => 'required|string|max:255',
            'scope_ar' => 'required|string|max:255',
            'scope_en' => 'required|string|max:255',
        ];

        // Check if the route name is 'admin.modules.store' to apply image validation
        if ($this->route()->getName() === 'admin.modules.store') {
            $rules['image'] = 'required|file'; // Image is required for 'store'
        } elseif ($this->route()->getName() === 'admin.modules.update') {
            $rules['image'] = 'nullable|file'; // Image is optional for 'update'
        }


        return $rules;
    }

}

<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
{
    public function rules()
    {
        $rules = [
            'title_ar' => 'required|string|max:255',
            'title_en' => 'required|string|max:255',
            'desc_ar' => 'required',
            'desc_en' => 'required',
        ];

        // Check if the route name is 'admin.modules.store' to apply image validation
        if ($this->route()->getName() === 'admin.posts.store') {
            $rules['image'] = 'required|file'; // Image is required for 'store'
        } elseif ($this->route()->getName() === 'admin.posts.update') {
            $rules['image'] = 'nullable|file'; // Image is optional for 'update'
        }


        return $rules;
    }

}

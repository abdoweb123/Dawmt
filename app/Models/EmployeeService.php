<?php

namespace App\Models;


class EmployeeService extends BaseModel
{
    protected $fillable = ['title_ar', 'title_en', 'desc_ar', 'desc_en', 'status'];

    protected $table = 'employee_services';
}

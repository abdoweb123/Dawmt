<?php

namespace App\Models;

class Value extends BaseModel
{
    protected $fillable = ['title_ar', 'title_en', 'desc_ar', 'desc_en', 'show_type', 'arrangement', 'image', 'status'];

    protected $table = 'values';

} //end of class

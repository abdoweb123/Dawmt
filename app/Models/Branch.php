<?php

namespace App\Models;

class Branch extends BaseModel
{
    protected $fillable = ['title_ar', 'title_en', 'phone', 'google_map_link', 'status'];

    protected $table = 'branches';

}
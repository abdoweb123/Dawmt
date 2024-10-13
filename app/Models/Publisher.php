<?php

namespace App\Models;

class Publisher extends BaseModel
{
    protected $fillable = ['title_ar', 'title_en', 'status'];

    protected $table = 'publishers';
}

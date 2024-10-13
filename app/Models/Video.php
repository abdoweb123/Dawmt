<?php

namespace App\Models;

class Video extends BaseModel
{
    protected $fillable = ['title_ar', 'title_en', 'desc_ar', 'desc_en', 'cover_image', 'link', 'status'];

    protected $table = 'videos';

} //end of class

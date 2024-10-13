<?php

namespace App\Models;


class Feature extends BaseModel
{
    protected $fillable = ['title_ar', 'title_en', 'type'];  // type [normal, advanced]

    protected $table = 'features';
}

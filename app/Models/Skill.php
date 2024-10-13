<?php

namespace App\Models;


class Skill extends BaseModel
{
    protected $fillable = ['title_ar', 'title_en', 'status'];

    protected $table = 'skills';
}

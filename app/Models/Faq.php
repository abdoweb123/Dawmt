<?php

namespace App\Models;

class Faq extends BaseModel
{
    protected $fillable = ['question_ar','question_en','answer_ar','answer_en','status'];

    protected $table = 'faq';
}

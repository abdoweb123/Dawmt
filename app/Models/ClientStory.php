<?php

namespace App\Models;

class ClientStory extends BaseModel
{
    protected $fillable = ['title_ar', 'title_en', 'cover_image', 'link', 'status'];

    protected $table = 'client_stories';

} //end of class

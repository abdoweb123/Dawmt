<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Post extends BaseModel
{
    protected $fillable = [
        'title_ar',
        'title_en',
        'publisher_id',
        'date',
        'desc_ar',
        'desc_en',
        'brief_desc_ar',
        'brief_desc_en',
        'show_in_top',
        'show_in_head',
        'image',
        'status',
    ];


    protected $table = 'posts';


    /*** Relations ***/

    public function publisher() : belongsTo
    {
        return $this->belongsTo(Publisher::class,'publisher_id');
    }

} //end of class










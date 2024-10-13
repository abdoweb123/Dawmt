<?php

namespace App\Models;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Modules\Item\Entities\Model as Item;

class Statistic extends BaseModel
{
    protected $table = 'statistics';

    // Add fillable property
    protected $fillable = [
        'number',
        'title_ar',
        'title_en',
        'desc_ar',
        'desc_en',
    ];


} //end of class

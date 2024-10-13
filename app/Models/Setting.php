<?php

namespace App\Models;

use App\Models\BaseModel;

class Setting extends BaseModel
{
    protected $table = 'settings';

    // Add fillable property
    protected $fillable = [
        'key',
        'value',
        'type',
        'status',
    ];

} //end of class

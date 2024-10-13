<?php

namespace App\Models;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Modules\Item\Entities\Model as Item;

class Module extends BaseModel
{
    protected $table = 'modules';

    // Add fillable property
    protected $fillable = [
        'title_ar',
        'title_en',
        'desc_ar',
        'desc_en',
        'scope_ar',
        'scope_en',
        'image',
    ];


    /*** Start Relations ***/
    public function supports(): BelongsToMany
    {
        return $this->belongsToMany(Support::class, 'module_supports','module_id','support_id');
    }

} //end of class

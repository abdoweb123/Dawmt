<?php

namespace Modules\Package\Entities;

use App\Models\BaseModel;
use Modules\Item\Entities\Model as Item;

class Model extends BaseModel
{
    protected $guarded = [];

    protected $table = 'packages';

    // In Package.php
    public function items()
    {
        return $this->belongsToMany(Item::class, 'package_items','package_id','item_id');
    }
}

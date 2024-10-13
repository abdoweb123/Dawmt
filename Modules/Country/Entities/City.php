<?php

namespace Modules\Country\Entities;

use App\Models\BaseModel;
use Rennokki\QueryCache\Traits\QueryCacheable;

class City extends BaseModel
{

    protected $guarded = [];

    protected $table = 'cities';
}

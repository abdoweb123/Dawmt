<?php

namespace Modules\Country\Entities;

use App\Models\BaseModel;
use Modules\Block\Entities\Model as Block;
use Rennokki\QueryCache\Traits\QueryCacheable;

class Country extends BaseModel
{
    protected $guarded = [];

    protected $table = 'countries';


    protected static function boot()
    {
        parent::boot();
        static::retrieved(function($item){
            $item->currancy_code = $item['currancy_code_'.lang()];
        });
    }

    public function Regions()
    {
        return $this->hasMany(Region::class)->orderBy('title_'.lang());
    }
}

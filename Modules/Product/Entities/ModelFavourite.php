<?php

namespace Modules\Product\Entities;

use App\Models\BaseModel;
use Modules\Client\Entities\Model as Client;

class ModelFavourite extends BaseModel
{
    protected $guarded = [];

    protected $table = 'product_favourites';
    
    public function Client()
    {
        return $this->belongsTo(Client::class,'client_id');
    }

}

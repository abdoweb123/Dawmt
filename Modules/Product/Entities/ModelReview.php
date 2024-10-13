<?php

namespace Modules\Product\Entities;

use App\Models\BaseModel;
use Modules\Client\Entities\Model as Client;

class ModelReview extends BaseModel
{
    protected $guarded = [];

    protected $table = 'product_reviews';
    
    public function Client()
    {
        return $this->belongsTo(Client::class,'client_id');
    }

}

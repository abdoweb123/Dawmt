<?php

namespace Modules\Product\Entities;

use App\Models\BaseModel;
use Modules\Color\Entities\Model as Color;
use Modules\Size\Entities\Model as Size;
use Modules\Product\Entities\Model as Product;

class ModelItem extends BaseModel
{
    protected $guarded = [];

    protected $table = 'product_items';
    
    
    public function Color()
    {
        return $this->belongsTo(Color::class,'color_id');
    }

    public function Size()
    {
        return $this->belongsTo(Size::class,'size_id');
    }

    public function Product()
    {
        return $this->belongsTo(Product::class,'product_id');
    }

    public function CalcPrice()
    {
        $Product = $this->Product;
        if ($Product->discount && $Product->from < now() && $Product->to > now()) {
            return format_number(($this->price - ($this->price / 100 * $Product->discount)) * Country()->currancy_value);
        } else {
            return format_number($this->price * Country()->currancy_value);
        }
    }
    
    public function Price()
    {
        return format_number($this->price * Country()->currancy_value);
    }
}

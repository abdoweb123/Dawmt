<?php

namespace Modules\Product\Http\Resources;

class ProductSizeResource extends BaseResource
{
    public function toArray($request)
    { 
        return [
            'price_before' => $this->Price() .' '. Country()->currancy_code,
            'price_after' => $this->CalcPrice() .' '. Country()->currancy_code,
            'quantity' => $this->quantity,
            'size' => SizeResource::make($this->Size),
        ];
    }
}

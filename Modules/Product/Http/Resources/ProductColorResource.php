<?php

namespace Modules\Product\Http\Resources;

class ProductColorResource extends BaseResource
{
    public function toArray($request)
    {
        return [
            'price_before' => $this->Price() .' '. Country()->currancy_code,
            'price_after' => $this->CalcPrice() .' '. Country()->currancy_code,
            'quantity' => $this->quantity,
            'color' => ColorResource::make($this->Color),
        ];
    }
}

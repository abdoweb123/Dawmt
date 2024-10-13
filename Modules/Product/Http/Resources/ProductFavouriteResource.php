<?php

namespace Modules\Product\Http\Resources;

class ProductFavouriteResource extends BaseResource
{
    public function toArray($request)
    {
        return [
            'product' => ProductResource::make($this->Product),
        ];
    }
}

<?php

namespace Modules\Product\Http\Resources;

class ProductItemsResource extends BaseResource
{
    public function toArray($request)
    { 
        return [
            'size' => SizeResource::make($this->first()->Size),
            'colors' => ProductColorResource::collection($this),
        ];
    }
}

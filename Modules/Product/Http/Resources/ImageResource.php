<?php

namespace Modules\Product\Http\Resources;

class ImageResource extends BaseResource
{
    public function toArray($request)
    {
        return [
            'image' => asset($this->image ?? setting('logo')),
        ];
    }
}

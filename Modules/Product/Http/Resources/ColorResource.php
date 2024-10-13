<?php

namespace Modules\Product\Http\Resources;

class ColorResource extends BaseResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' => $this->title(),
            'hexa' => $this->hexa,
        ];
    }
}

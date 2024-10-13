<?php

namespace Modules\Product\Http\Resources;

class SizeResource extends BaseResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' => $this->title(),
        ];
    }
}

<?php

namespace Modules\Product\Http\Resources;

class RateResource extends BaseResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'rate' => $this->rate,
            'comment' => $this->comment,
            'created_at' => $this->created_at,
        ];
    }
}

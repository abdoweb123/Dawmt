<?php

namespace Modules\Country\Http\Resources;

use App\Http\Resources\BaseResource;

class RegionResource extends BaseResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' => $this->title(),
        ];
    }
}

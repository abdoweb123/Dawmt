<?php

namespace Modules\Product\Http\Resources;

class ProductWithReviewResource extends BaseResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' => $this->title(),
            'AvgReviews' => number_format((int)$this->Rates->avg('rate'),1),
            'CountReviews' => $this->Rates->count('rate'),
            'Reviews' => $this->Rates,
        ];
    }
}

<?php

namespace Modules\Product\Http\Requests;

use App\Http\Requests\API\BaseRequest;

class ProductReviewRequest extends BaseRequest
{
    public function rules()
    {
        return [
            'product_id' => 'required|exists:products,id',
            'rate' => 'required',
            'comment' => 'required',
        ];
    }
}

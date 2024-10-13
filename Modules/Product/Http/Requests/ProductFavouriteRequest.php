<?php

namespace Modules\Product\Http\Requests;

use App\Http\Requests\API\BaseRequest;

class ProductFavouriteRequest extends BaseRequest
{
    public function rules()
    {
        return [
            'product_id' => 'required|exists:products,id',
        ];
    }
}

<?php

namespace Modules\Product\Http\Resources;

use Illuminate\Support\Facades\Route;
use Modules\Cart\Entities\Model as Cart;

class ProductResource extends BaseResource
{
    public function toArray($request)
    {
        $arr = [
            'id' => $this->id,
            
            'has_discount' => $this->HasDiscount(),
            'discount' => (string)$this->discount,


            'code' => $this->code,
            'title' => $this['title_'.lang()],
            'desc' => $this['desc_'.lang()],
            'is_fav' => $this->IsFav ?? false,
            'rate' => number_format((int)$this->rate ?? 0 ,1),
            'cart_count' => auth('sanctum')->check() ? Cart::where('client_id',auth('sanctum')->id())->count() : 0,
            'brand' => $this->brand_id ? $this->Brand['title_'.lang()] : NULL,
        ];
        
        $arr['images'] = ImageResource::collection($this->Images);
        
        if($this->Items->whereNotNull("size_id")->count() > 0 && $this->Items->whereNotNull("color_id")->count() == 0){
            $arr['type'] = 'sizes';
            $arr['sizes'] = ProductSizeResource::collection($this->Items);
        }elseif($this->Items->whereNotNull("size_id")->count() == 0 && $this->Items->whereNotNull("color_id")->count() > 0){
            $arr['type'] = 'colors';
            $arr['colors'] = ProductColorResource::collection($this->Items);
        }elseif($this->Items->whereNotNull("size_id")->whereNotNull("color_id")->count() > 0){
            $arr['type'] = 'size_colors';
            $arr['size_colors'] = ProductItemsResource::collection($this->Items->groupBy('size_id'));
        }
        
        $sum_rates = collect();
        $sum_rates['1'] = $this->Rates->where('rate',1)->count();
        $sum_rates['2'] = $this->Rates->where('rate',2)->count();
        $sum_rates['3'] = $this->Rates->where('rate',3)->count();
        $sum_rates['4'] = $this->Rates->where('rate',4)->count();
        $sum_rates['5'] = $this->Rates->where('rate',5)->count();
    
        $arr['sum_rates'] = $sum_rates;
        $arr['rates'] = RateResource::collection($this->Rates);
        
        return $arr;
    }
    


}

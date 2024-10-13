<?php

namespace Modules\Product\Http\Controllers;

use App\Functions\ResponseHelper;
use Modules\Product\Http\Requests\ProductFavouriteRequest;
use Modules\Product\Http\Resources\ImageResource;
use Modules\Product\Http\Resources\ProductSizeResource;
use Modules\Product\Http\Resources\ProductItemsResource;
use Modules\Product\Http\Resources\ProductColorResource;
use App\Http\Controllers\BasicController;
use Illuminate\Http\Request;

class ProductFavouriteController extends BasicController
{

    public function index($lang, Request $request)
    {
        $this->CheckAuth();
        $Products = $this->Client->FavProducts()->where('products.status',1)->select('products.id','title_'.lang().' as title','desc_'.lang().' as desc','from','to','discount')->get();
        foreach($Products as $Product){
            
            $Product['has_discount'] = $Product->hasDiscount();
            $Product['discount'] = $Product->discount;

            $Product['all_images'] = ImageResource::collection($Product->Images);
            if($Product->Items->whereNotNull("size_id")->count() > 0 && $Product->Items->whereNotNull("color_id")->count() == 0){
                $Product['type'] = 'sizes';
                $Product['sizes'] = ProductSizeResource::collection($Product->Items);
            }elseif($Product->Items->whereNotNull("size_id")->count() == 0 && $Product->Items->whereNotNull("color_id")->count() > 0){
                $Product['type'] = 'colors';
                $Product['colors'] = ProductColorResource::collection($Product->Items);
            }elseif($Product->Items->whereNotNull("size_id")->whereNotNull("color_id")->count() > 0){
                $Product['type'] = 'size_colors';
                $Product['size_colors'] = ProductItemsResource::collection($Product->Items->groupBy('size_id'));
            }
            unset($Product['Images']);
            unset($Product['Item']);
            unset($Product['from']);
            unset($Product['to']);
            unset($Product['discount']);
        }
        return ResponseHelper::make($Products);
    }

    public function store($lang,ProductFavouriteRequest $request)
    {
        $this->CheckAuth();
        $this->Client->FavProducts()->attach($request->product_id);
        return ResponseHelper::make(NULL,__('trans.addedSuccessfully'));
    }

    public function show($lang, $id, Request $request)
    {
        $this->CheckAuth();
        return ResponseHelper::make(ProductResource::make($this->Client->FavProducts()->where('id', $id)->first()));
    }

    public function update($lang, $id,ProductFavouriteRequest $request)
    {
        $this->CheckAuth();
        $this->Client->FavProducts()->where('id', $id)>update($request->validated());
        return ResponseHelper::make(NULL,__('trans.updatedSuccessfully'));
    }
    public function destroy($lang, $id)
    {
        $this->CheckAuth();
        $this->Client->FavProducts()->detach($id);
        return ResponseHelper::make(null,__('trans.DeletedSuccessfully'));
    }
}

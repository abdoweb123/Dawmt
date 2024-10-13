<?php

namespace Modules\Product\Http\Controllers;

use Illuminate\Http\Request;
use App\Functions\ResponseHelper;
use Modules\Product\Entities\Model as Product;
use App\Http\Controllers\BasicController;
use Modules\Product\Http\Requests\ProductReviewRequest;
use Modules\Product\Http\Resources\ProductWithReviewResource;

class ProductReviewController extends BasicController
{

    public function index($lang, Request $request)
    {
        $Products = Product::with(['Rates'=>function($query){
            $query->select('id','rate','comment','product_id','client_id','created_at')->with(['Client'=>function($query){
                $query->select('id','name');
            }]);
        }])->when(request('product_id'), function ($query) {
                return $query->where('id', request('product_id'));
            })->get();
        return ResponseHelper::make(ProductWithReviewResource::collection($Products));
    }

    public function store($lang,ProductReviewRequest $request)
    {
        $this->CheckAuth();
        if($this->Client->ProductRates()->where('product_id',$request->product_id)->count()){
            return ResponseHelper::make(null,__('trans.you-reviewed-already'),false);
        }
        $this->Client->ProductRates()->attach($request->product_id,[
                'rate' => $request->rate ?? 0,
                'comment' => $request->comment ?? '',
                'created_at' => now(),
            ]);
        return ResponseHelper::make(NULL,__('trans.addedSuccessfully'));
    }

    public function show($lang, $id, Request $request)
    {
        $Product = Product::with(['Rates'=>function($query) use($id){
            $query->when(request('review_id'), function ($query) {
                return $query->where('id', request('review_id'));
            })->select('id','rate','comment','product_id','client_id','created_at')->with(['Client'=>function($query){
                $query->select('id','name');
            }]);
        }])
        ->where('id', $id)
        ->firstorfail();
        return ResponseHelper::make(ProductWithReviewResource::make($Product));
            
    }

    public function update($lang, $id,ProductReviewRequest $request)
    {
        $this->CheckAuth();
        $this->Client->ProductRates()->wherePivot('id', $id)->update($request->validated());
        return ResponseHelper::make(NULL,__('trans.updatedSuccessfully'));
    }
    public function destroy($lang, $id)
    {
        $this->CheckAuth();
        $this->Client->ProductRates()->detach($id);
        return ResponseHelper::make(null,__('trans.DeletedSuccessfully'));
    }
}

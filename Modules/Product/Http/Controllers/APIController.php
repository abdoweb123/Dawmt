<?php

namespace Modules\Product\Http\Controllers;

use App\Functions\ResponseHelper;
use App\Http\Controllers\BasicController;
use Illuminate\Http\Request;
use Modules\Product\Entities\Model;
use Modules\HomeScreen\Entities\Model as HomeScreen;
use Modules\Product\Http\Resources\ProductResource;

class APIController extends BasicController
{
    public function index()
    {
        $Models = Model::query()
            ->where('status',1)
            ->OrderBy('arrangement')
            ->with(['Item' => ['Color','Size'],'Rates','Categories'])
            ->when(request('title'), function ($query) {
                return $query->where(function($query2)  {
                    $query2->where('title_ar', 'like', '%'.request('title').'%')->orwhere('title_en', 'like', '%'.request('title').'%');
                });
            })
            ->when(request('home_screen'), function ($query) {
                $ids = explode(',',HomeScreen::where('id',request('home_screen'))->firstorfail()->items);
                return $query->whereIn('id', $ids);
            })
            ->when(request('search'), function ($query) {
                return $query->where(function($query2)  {
                    $query2->where('title_ar', 'like', '%'.request('search').'%')->orwhere('title_en', 'like', '%'.request('search').'%');
                });
            })
            ->WhereHas('Categories' , function($q){
                $q->when(request('category_id'), function ($query) {
                    return $query->where('category_id', request('category_id'));
                });
            })
            ->paginate(10);
            
        $Models->data = ProductResource::collection($Models);
        return ResponseHelper::make($Models);
    }
    
    public function show()
    {
        $Model = Model::with(['Item' => ['Color','Size'],'Rates','Categories'])->where('id',request('id'))->firstorfail();
        return ResponseHelper::make(ProductResource::make($Model));
    }
}

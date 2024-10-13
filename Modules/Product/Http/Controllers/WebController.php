<?php

namespace Modules\Product\Http\Controllers;

use App\Functions\Upload;
use App\Http\Controllers\BasicController;
use Illuminate\Http\Request;
use Modules\Product\Entities\Model;
use Modules\Category\Entities\Model as Category;
use Modules\Size\Entities\Model as Size;
use Modules\Brand\Entities\Model as Brand;
use Modules\Color\Entities\Model as Color;

class WebController extends BasicController
{
    public function index(Request $request)
    {
        $Models = Model::OrderBy('arrangement')->get();

        return view('product::index', compact('Models'));
    }

    public function create()
    {
        $Categories = Category::get();
        $Sizes = Size::get();
        $Colors = Color::get();
        $Brands = Brand::get();

        return view('product::create', compact('Categories','Sizes','Colors','Brands'));
    }

    public function store(Request $request)
    {
        $Model = Model::create($request->only('coupon','brand_id', 'title_ar', 'title_en', 'brand_ar', 'brand_en', 'desc_ar', 'desc_en', 'code', 'VAT', 'discount', 'from', 'to'));
        $Model->Categories()->sync($request->categories);
        
        
        $data = [];
        foreach ($request->prices as $key => $p) {
            $item = [];
            $item['product_id'] = $Model->id;
            $item['size_id'] = in_array($request->filter,['has_size','has_size_color']) ? $request->sizes[$key] : NULL;
            $item['color_id'] = in_array($request->filter,['has_color','has_size_color']) ? $request->colors[$key] : NULL;
            $item['price'] = $request->prices[$key];
            $item['quantity'] = $request->quantities[$key];
            $data[] = $item;
        }

        $Model->Items()->delete();
        $Model->Items()->insert($data);
        if ($request->images) {
            foreach(Upload::uploadFiles($request->images, 'products') as $image){
                $Model->Images()->create([
                    'image' => $image    
                ]);
            }
        }

        alert()->success(__('trans.addedSuccessfully'));
        return redirect()->back();
    }

    public function show($id)
    {
        abort(404);
    }

    public function edit($id)
    {
        $Model = Model::where('id', $id)->firstorfail();
        $Categories = Category::get();
        $Sizes = Size::get();
        $Colors = Color::get();
        $Brands = Brand::get();

        return view('product::edit', compact('Model','Categories','Sizes','Colors','Brands'));
    }

    public function update(Request $request, $id)
    {
        $Model = Model::where('id', $id)->firstorfail();
        $data = [];
        foreach ($request->prices as $key => $p) {
            $item = [];
            $item['product_id'] = $Model->id;
            $item['size_id'] = in_array($request->filter,['has_size','has_size_color']) ? $request->sizes[$key] : NULL;
            $item['color_id'] = in_array($request->filter,['has_color','has_size_color']) ? $request->colors[$key] : NULL;
            $item['price'] = $request->prices[$key];
            $item['quantity'] = $request->quantities[$key];
            $data[] = $item;
        }

        $Model->update($request->only('coupon','brand_id', 'title_ar', 'title_en', 'brand_ar', 'brand_en', 'desc_ar', 'desc_en', 'code', 'VAT', 'discount', 'from', 'to'));
        $Model->Categories()->sync($request->categories);
        $Model->Items()->delete();
        $Model->Items()->insert($data);
        if ($request->images) {
            foreach(Upload::uploadFiles($request->images, 'products') as $image){
                $Model->Images()->create([
                    'image' => $image    
                ]);
            }
        }

        alert()->success(__('trans.updatedSuccessfully'));

        return redirect()->back();
    }

    public function destroy($id)
    {
        $Model = Model::where('id', $id)->delete();
    }
    
    
    
    
    public function sort (Request $request)
    {
        $request_categories = $request->categories;
        $Categories = \Modules\Category\Entities\Model::whereHas('Products')->with('Products')->withCount('Products')->having('products_count', '>', 1)->get();
        $CatSort = 1;
        \Modules\Category\Entities\Model::query()->update(['arrangement' => NULL]);
        foreach($request_categories as $CategoryId => $Data){
            \Modules\Category\Entities\Model::where('id',$CategoryId)->update(['arrangement' => $CatSort]);
            $CatSort++;
            $Category = $Categories->where('id',$CategoryId)->first();
            $ProductSort = 1;
            if($Category && isset($Data) && is_array($Data) ){
                foreach($Data as $ProductId){
                    $Category->Products()->updateExistingPivot($ProductId, ['arrangement' => $ProductSort]);
                    $ProductSort++;
                }
            }
        }
        alert()->success(__('trans.updatedSuccessfully'));
        return back();
    }
}

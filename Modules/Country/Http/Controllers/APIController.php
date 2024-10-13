<?php

namespace Modules\Country\Http\Controllers;

use App\Functions\ResponseHelper;
use App\Functions\Upload;
use App\Http\Controllers\BasicController;
use Illuminate\Http\Request;
use Modules\Country\Entities\Country;
use Modules\Country\Entities\Region;
use Modules\Country\Entities\City;

class APIController extends BasicController
{
    public function countries()
    {
        return ResponseHelper::make(Country::select('id','title_'.lang().' As title','phone_code','country_code','length','image')->orderByRaw("FIELD(id, 2,1,3,4,5,6,7)")->get()->each(function ($item ,$key) {
            $item->image =  asset($item->image);
        }));
    }
    
    public function regions()
    {
        return ResponseHelper::make(Region::select('id','title_'.lang().' As title')->where('country_id',request('country_id') ?? 1)->get());
    }
    
    public function cities()
    {
        return ResponseHelper::make(City::select('id','title_'.lang().' As title')->where('region_id',request('region_id'))->get());
    }
}

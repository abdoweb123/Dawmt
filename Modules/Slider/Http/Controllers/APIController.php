<?php

namespace Modules\Slider\Http\Controllers;

use App\Functions\ResponseHelper;
use App\Functions\Upload;
use App\Http\Controllers\BasicController;
use Illuminate\Http\Request;
use Modules\Slider\Entities\Model;

class APIController extends BasicController
{
    public function index()
    {
        return ResponseHelper::make(Model::select('title_'.lang().' AS title','desc_'.lang().' AS desc','file as image')->get()->each(function ($item ,$key) {
            $item->image =  asset($item->image);
        }));
    }
}

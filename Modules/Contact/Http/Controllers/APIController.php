<?php

namespace Modules\Contact\Http\Controllers;

use App\Functions\Upload;
use App\Functions\ResponseHelper;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Laravel\Sanctum\PersonalAccessToken;
use Modules\Contact\Entities\Model;
use Modules\Contact\Http\Requests\ContactRequest;
use  App\Http\Controllers\BasicController;

class APIController extends BasicController
{
    public function store(ContactRequest $request)
    {
        Model::create($request->all());
        return ResponseHelper::make(NULL,__('trans.addedSuccessfully'));

    }
}

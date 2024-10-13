<?php

namespace App\Http\Controllers\Admin;

use App\Functions\Upload;
use App\Http\Controllers\BasicController;
use App\Models\SliderClient;
use Illuminate\Http\Request;

class SliderClientController extends BasicController
{
    public function index(Request $request)
    {
        $Models = SliderClient::get();

        return view('Admin.sliderClients.index', compact('Models'));
    }

    public function create()
    {
        return view('Admin.sliderClients.create');
    }

    public function store(Request $request)
    {
        $Model = SliderClient::create($request->all());
        if ($request->hasFile('file')) {
            $Model->file = Upload::UploadFile($request->file, 'SliderClient');
            $Model->save();
        }
        alert()->success(__('trans.addedSuccessfully'));

        return redirect()->back();
    }

    public function show($id)
    {
        $Model = SliderClient::where('id', $id)->firstorfail();

        return view('Admin.sliderClients.show', compact('Model'));
    }

    public function edit($id)
    {
        $Model = SliderClient::where('id', $id)->firstorfail();

        return view('Admin.sliderClients.edit', compact('Model'));
    }

    public function update(Request $request, $id)
    {
        $Model = SliderClient::where('id', $id)->firstorfail();
        $Model->update($request->all());
        if ($request->hasFile('file')) {
            $Model->file = Upload::UploadFile($request->file, 'SliderClient');
            $Model->save();
        }
        alert()->success(__('trans.updatedSuccessfully'));

        return redirect()->back();
    }

    public function destroy($id)
    {
        $Model = SliderClient::where('id', $id)->delete();
    }

} //end of class

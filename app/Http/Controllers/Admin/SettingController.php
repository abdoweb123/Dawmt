<?php

namespace App\Http\Controllers\Admin;

use App\Functions\Upload;
use App\Http\Controllers\BasicController;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends BasicController
{
    public function index()
    {
        return $this->show(null);
    }

    public function show($type = null)
    {
//        $settings = Setting::when($type, function ($query, $type) {
//            return $query->where('type', $type);
//        })->get();

        // If $type is null, filter by 'publicSettings'; otherwise, use the provided $type.
        $settings = Setting::when($type, function ($query, $type) {
            return $query->where('type', $type);
        }, function ($query) {
            return $query->where('type', 'publicSettings');
        })->get();

        return view('Admin.settings.edit', compact('settings', 'type'));
    }


    public function store(Request $request)
    {
        if ($request['valuetype'] == 'description') {
            Setting::create($request->only('key', 'type', 'value'));
        }
        if ($request['valuetype'] == 'image') {
            $imageName = Upload::UploadFile($request->file('Imagevalue'), 'Settings');
            Setting::create($request->only('key', 'type') + ['value' => $imageName]);
        }
        alert()->success(__('trans.addedSuccessfully'));

        return redirect()->route(activeGuard().'.settings.index');
    }

    public function update(Request $request, $id, $type=null)
    {
        if ($request->type) {
            $settings = Setting::latest()->where('type', $request->type)->get();
        } else {
            $settings = Setting::get();
        }

        foreach ($settings as $setting) {
            if (str_contains($setting['key'], '_image') || str_contains($setting['key'], 'logo')) {
                if ($request->hasFile($setting['key'])) {
                    Upload::deleteImage($setting['value'], 'Settings');
                    Setting::latest()->where('key', $setting['key'])->update(['value' => Upload::UploadFile($request[$setting['key']], 'Settings')]);
                }
            } elseif (str_contains($setting['key'], '_images') || str_contains($setting['key'], 'logo')) {
                if ($request->hasFile($setting['key'])) {
                    Upload::deleteImage($setting['value'], 'Settings');
                    Setting::latest()->where('key', $setting['key'])->update(['value' => Upload::UploadFiles($request[$setting['key']], 'Settings')]);
                }
            } else {
                Setting::latest()->where('key', $setting['key'])->update(['value' => $request->get($setting['key'])]);
            }
        }
        alert()->success(__('trans.updatedSuccessfully'));

        return redirect()->route(activeGuard().'.settings.index', $request->type);
    }

    public function destroy(Setting $setting)
    {
        $setting->delete();

    }

} //end of class

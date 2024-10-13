<?php

namespace App\Http\Services\Admin;

use App\Functions\Upload;

trait ModuleService
{

    public function uploadImage($request, $module)
    {
        if ($request->hasFile('image')) {
            $module->image = Upload::UploadFile($request->image, 'Modules');
            $module->save();
        }
    }


    public function supports($request, $module)
    {
        // Attach items without detaching existing ones
        $module->supports()->sync($request->input('supports'));
    }



} //end of trait

<?php

namespace App\Http\Controllers\Admin;

use App\Functions\Upload;
use App\Http\Controllers\BasicController;
use App\Models\Video;
use Illuminate\Http\Request;

class VideoController extends BasicController
{
    public function index(Request $request)
    {
        $models = Video::paginate(50);

        return view('Admin.videos.index', compact('models'));
    }

    
    public function create()
    {
        return view('Admin.videos.create');
    }

    
    public function store(Request $request)
    {
        $request->validate([
            'title_ar' => 'required|string|max:255',
            'title_en' => 'required|string|max:255',
            'link' => 'required|string|max:255',
        ]);

        // Create a new plan with the new arrangement value
        $model = Video::create($request->all());

        if ($request->hasFile('image')) {
            $model->cover_image = Upload::UploadFile($request->image, 'Videos');
            $model->save();
        }

        alert()->success(__('trans.addedSuccessfully'));

        return redirect()->back();
    }

    
    public function show($id)
    {
        $model = Video::where('id', $id)->firstorfail();

        return view('Admin.videos.show', compact('model'));
    }
    

    public function edit($id)
    {
        $model = Video::where('id', $id)->firstorfail();

        return view('Admin.videos.edit', compact('model'));
    }
    

    public function update(Request $request, $id)
    {
//        return $request->all();
        $request->validate([
            'title_ar' => 'required|string|max:255',
            'title_en' => 'required|string|max:255',
            'link' => 'required|string|max:255',
        ]);

        $model = Video::where('id', $id)->firstorfail();

        $model->update($request->all());

        if ($request->hasFile('image')) {
            $model->cover_image = Upload::UploadFile($request->image, 'Videos');
            $model->save();
        }

        alert()->success(__('trans.updatedSuccessfully'));

        return redirect()->back();
    }


    public function destroy($id)
    {
        $model = Video::where('id', $id)->delete();
    }


    /*** To update most_popular ***/
    public function update_most_popular($id)
    {
        $video = Video::where('id', $id)->firstOrFail();

        $video->most_popular = !$video->most_popular;
        $video->save();

        return response()->json(['success' => true, 'message' => __('trans.updatedSuccessfully')]);
    }


} //end of class

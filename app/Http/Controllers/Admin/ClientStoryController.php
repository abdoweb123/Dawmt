<?php

namespace App\Http\Controllers\Admin;

use App\Functions\Upload;
use App\Http\Controllers\BasicController;
use App\Models\ClientStory;
use App\Models\Video;
use Illuminate\Http\Request;

class ClientStoryController extends BasicController
{
    public function index(Request $request)
    {
        $models = ClientStory::paginate(50);

        return view('Admin.clientStories.index', compact('models'));
    }

    
    public function create()
    {
        return view('Admin.clientStories.create');
    }

    
    public function store(Request $request)
    {
        $request->validate([
            'title_ar' => 'required|string|max:255',
            'title_en' => 'required|string|max:255',
            'link' => 'required|string|max:255',
        ]);

        // Create a new plan with the new arrangement value
        $model = ClientStory::create($request->all());

        if ($request->hasFile('image')) {
            $model->cover_image = Upload::UploadFile($request->image, 'ClientStories');
            $model->save();
        }

        alert()->success(__('trans.addedSuccessfully'));

        return redirect()->back();
    }

    
    public function show($id)
    {
        $model = ClientStory::where('id', $id)->firstorfail();

        return view('Admin.clientStories.show', compact('model'));
    }
    

    public function edit($id)
    {
        $model = ClientStory::where('id', $id)->firstorfail();

        return view('Admin.clientStories.edit', compact('model'));
    }
    

    public function update(Request $request, $id)
    {
//        return $request->all();
        $request->validate([
            'title_ar' => 'required|string|max:255',
            'title_en' => 'required|string|max:255',
            'link' => 'required|string|max:255',
        ]);

        $model = ClientStory::where('id', $id)->firstorfail();

        $model->update($request->all());

        if ($request->hasFile('image')) {
            $model->cover_image = Upload::UploadFile($request->image, 'ClientStories');
            $model->save();
        }

        alert()->success(__('trans.updatedSuccessfully'));

        return redirect()->back();
    }


    public function destroy($id)
    {
        $model = ClientStory::where('id', $id)->delete();
    }


} //end of class

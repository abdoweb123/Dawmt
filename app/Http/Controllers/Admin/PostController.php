<?php

namespace App\Http\Controllers\Admin;

use App\Functions\Upload;
use App\Http\Controllers\BasicController;
use App\Http\Requests\Admin\PostRequest;
use App\Models\Post;
use App\Models\Publisher;
use Illuminate\Http\Request;

class PostController extends BasicController
{
    public function index(Request $request)
    {
        $models = Post::paginate(50);

        return view('Admin.posts.index', compact('models'));
    }

    public function create()
    {
        $publishers = Publisher::Active()->get();

        return view('Admin.posts.create',compact('publishers'));
    }

    public function store(PostRequest $request)
    {
        // Create a new plan with the new arrangement value
        $model = Post::create($request->all());

        if ($request->hasFile('image')) {
            $model->image = Upload::UploadFile($request->image, 'Posts');
            $model->save();
        }

        alert()->success(__('trans.addedSuccessfully'));

        return redirect()->back();
    }

    
    public function show($id)
    {
        $model = Post::where('id', $id)->firstorfail();

        return view('Admin.posts.show', compact('model'));
    }
    

    public function edit($id)
    {
        $model = Post::where('id', $id)->firstorfail();
        $publishers = Publisher::Active()->get();

        return view('Admin.posts.edit', compact('model','publishers'));
    }
    

    public function update(PostRequest $request, $id)
    {
        $model = Post::where('id', $id)->firstorfail();

        $model->update($request->all());

        if ($request->hasFile('image')) {
            $model->image = Upload::UploadFile($request->image, 'Posts');
            $model->save();
        }

        alert()->success(__('trans.updatedSuccessfully'));

        return redirect()->back();
    }


    public function destroy($id)
    {
        $model = Post::where('id', $id)->delete();
    }


    /*** To update most_popular ***/
    public function update_most_popular($id)
    {
        $post = Post::where('id', $id)->firstOrFail();

        $post->most_popular = !$post->most_popular;
        $post->save();

        return response()->json(['success' => true, 'message' => __('trans.updatedSuccessfully')]);
    }

    public function updateShowInTop(Request $request)
    {
        $post = Post::findOrFail($request->id);

        if ($request->show_in_top == 1) {
            // Set all others to 0
            Post::where('show_in_top', 1)->update(['show_in_top' => 0]);
        }

        $post->show_in_top = $request->show_in_top;
        $post->save();

        return response()->json(['message' => __('trans.updated_successfully')]);
    }

    public function updateShowInHead(Request $request)
    {
        $post = Post::findOrFail($request->id);
        $post->show_in_head = $request->show_in_head;
        $post->save();

        return response()->json(['message' => __('trans.updated_successfully')]);
    }


} //end of class

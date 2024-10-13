<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BasicController;
use App\Models\Publisher;
use Illuminate\Http\Request;

class PublisherController extends BasicController
{
    public function index(Request $request)
    {
        $models = Publisher::paginate(50);

        return view('Admin.publishers.index', compact('models'));
    }


    public function create()
    {
        return view('Admin.publishers.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'title_ar' => 'required|string|max:255',
            'title_en' => 'required|string|max:255',
        ]);
        
        $model = Publisher::create(array_merge($request->all()));

        alert()->success(__('trans.addedSuccessfully'));

        return redirect()->back();
    }


    public function show($id)
    {
        $model = Publisher::where('id', $id)->firstorfail();

        return view('Admin.publishers.show', compact('model'));
    }


    public function edit($id)
    {
        $model = Publisher::where('id', $id)->firstorfail();

        return view('Admin.publishers.edit', compact('model'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'title_ar' => 'required|string|max:255',
            'title_en' => 'required|string|max:255',
        ]);

        $model = Publisher::where('id', $id)->firstorfail();

        $model->update($request->all());

        alert()->success(__('trans.updatedSuccessfully'));

        return redirect()->back();
    }


    public function destroy($id)
    {
        $model = Publisher::where('id', $id)->delete();
    }


} //end of class

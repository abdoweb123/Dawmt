<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BasicController;
use App\Models\Feature;
use Illuminate\Http\Request;

class FeatureController extends BasicController
{
    public function index(Request $request)
    {
        $models = Feature::paginate(50);

        return view('Admin.features.index', compact('models'));
    }

    
    public function create()
    {
        return view('Admin.features.create');
    }

    
    public function store(Request $request)
    {
        $request->validate([
            'title_ar' => 'required|string|max:255',
            'title_en' => 'required|string|max:255',
        ]);

        $model = Feature::create($request->all());

        alert()->success(__('trans.addedSuccessfully'));

        return redirect()->back();
    }

    
    public function show($id)
    {
        $model = Feature::where('id', $id)->firstorfail();

        return view('Admin.features.show', compact('model'));
    }
    

    public function edit($id)
    {
        $model = Feature::where('id', $id)->firstorfail();

        return view('Admin.features.edit', compact('model'));
    }
    

    public function update(Request $request, $id)
    {
        $request->validate([
            'title_ar' => 'required|string|max:255',
            'title_en' => 'required|string|max:255',
        ]);

        $model = Feature::where('id', $id)->firstorfail();
        $model->update($request->all());

        alert()->success(__('trans.updatedSuccessfully'));

        return redirect()->back();
    }


    public function destroy($id)
    {
        $model = Feature::where('id', $id)->delete();
    }

    
    

} //end of class

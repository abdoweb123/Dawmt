<?php

namespace App\Http\Controllers\Admin;

use App\Functions\Upload;
use App\Http\Controllers\BasicController;
use App\Models\Value;
use Illuminate\Http\Request;

class ValueController extends BasicController
{
    public function index(Request $request)
    {
        $models = Value::paginate(50);

        return view('Admin.values.index', compact('models'));
    }

    
    public function create()
    {
        return view('Admin.values.create');
    }

    
    public function store(Request $request)
    {
        $request->validate([
            'title_ar' => 'required|string|max:255',
            'title_en' => 'required|string|max:255',
        ]);

        // Get the highest arrangement value from the 'Value' table and add 1
        $highestArrangement = Value::max('arrangement');
        $newArrangement = $highestArrangement ? $highestArrangement + 1 : 1;

        // Create a new Value with the new arrangement value
        $model = Value::create(array_merge($request->all(), ['arrangement' => $newArrangement]));

        if ($request->hasFile('image')) {
            $model->image = Upload::UploadFile($request->image, 'SliderClient');
            $model->save();
        }

        alert()->success(__('trans.addedSuccessfully'));

        return redirect()->back();
    }

    
    public function show($id)
    {
        $model = Value::where('id', $id)->firstorfail();

        return view('Admin.values.show', compact('model'));
    }
    

    public function edit($id)
    {
        $model = Value::where('id', $id)->firstorfail();

        return view('Admin.values.edit', compact('model'));
    }
    

    public function update(Request $request, $id)
    {
        $request->validate([
            'title_ar' => 'required|string|max:255',
            'title_en' => 'required|string|max:255',
        ]);

        $model = Value::where('id', $id)->firstorfail();

        $model->update($request->all());

        if ($request->hasFile('image')) {
            $model->image = Upload::UploadFile($request->image, 'SliderClient');
            $model->save();
        }

        alert()->success(__('trans.updatedSuccessfully'));

        return redirect()->back();
    }


    public function destroy($id)
    {
        $model = Value::where('id', $id)->delete();
    }


    // To update arrangement
    public function update_values_index(Request $request)
    {
        $values = $request->input('values');

        foreach ($values as $value) {
            Value::where('id', $value['id'])->update([
                'arrangement' => $value['arrangement'],
            ]);
        }

        return response()->json(['success' => true, 'message' => __('trans.updatedSuccessfully')]);

    }



} //end of class

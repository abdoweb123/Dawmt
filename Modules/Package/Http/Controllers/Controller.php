<?php

namespace Modules\Package\Http\Controllers;

use App\Functions\Upload;
use App\Http\Controllers\BasicController;
use Illuminate\Http\Request;
use Modules\Package\Entities\Model;
use Modules\Item\Entities\Model as Item;

class Controller extends BasicController
{
    public function index(Request $request)
    {
        $Models = Model::paginate(50);

        return view('package::index', compact('Models'));
    }

    public function create()
    {
        $items = Item::all();
        return view('package::create',compact('items'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title_ar' => 'required|string|max:255',
            'title_en' => 'required|string|max:255',
            'old_price' => 'required|numeric',
            'price' => 'required|numeric',
        ]);

        // Create the package
        $package = Model::create($request->only(['title_ar', 'title_en','old_price','price']));

        // Attach items without detaching existing ones
        if ($request->has('items')) {
            $package->items()->sync($request->input('items'));
        }

        alert()->success(__('trans.addedSuccessfully'));

        return redirect()->back();
    }

    public function show($id)
    {
        $Model = Model::where('id', $id)->firstorfail();

        return view('package::show', compact('Model'));
    }

    public function edit($id)
    {
        $items = Item::all();

        $Model = Model::where('id', $id)->firstorfail();

        return view('package::edit', compact('Model','items'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title_ar' => 'required|string|max:255',
            'title_en' => 'required|string|max:255',
            'old_price' => 'required|numeric',
            'price' => 'required|numeric',
        ]);


        // Create the package
        $package = Model::where('id', $id)->firstorfail();

        $package->update($request->only(['title_ar', 'title_en','old_price','price']));

        // Attach items without detaching existing ones
        if ($request->has('items')) {
            $package->items()->sync($request->input('items'));
        }

        alert()->success(__('trans.updatedSuccessfully'));

        return redirect()->back();
    }

    public function destroy($id)
    {
        $Model = Model::where('id', $id)->delete();
    }
}

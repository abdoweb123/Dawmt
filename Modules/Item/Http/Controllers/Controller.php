<?php

namespace Modules\Item\Http\Controllers;


use App\Http\Controllers\BasicController;
use Illuminate\Http\Request;
use Modules\Item\Entities\Model;

class Controller extends BasicController
{
    public function index(Request $request)
    {
        $Models = Model::paginate(50);

        return view('item::index', compact('Models'));
    }

    public function create()
    {
        return view('item::create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title_ar' => 'required|string|max:255',
            'title_en' => 'required|string|max:255',
        ]);

        $Model = Model::create($request->all());

        alert()->success(__('trans.addedSuccessfully'));

        return redirect()->back();
    }

    public function show($id)
    {
        $Model = Model::where('id', $id)->firstorfail();

        return view('item::show', compact('Model'));
    }

    public function edit($id)
    {
        $Model = Model::where('id', $id)->firstorfail();

        return view('item::edit', compact('Model'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title_ar' => 'required|string|max:255',
            'title_en' => 'required|string|max:255',
        ]);

        $Model = Model::where('id', $id)->firstorfail();
        $Model->update($request->all());

        alert()->success(__('trans.updatedSuccessfully'));

        return redirect()->back();
    }

    public function destroy($id)
    {
        $Model = Model::where('id', $id)->delete();
    }
}

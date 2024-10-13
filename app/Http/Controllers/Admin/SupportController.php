<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BasicController;
use App\Models\Support;
use Illuminate\Http\Request;

class SupportController extends BasicController
{
    public function index(Request $request)
    {
        $supports = Support::paginate(50);

        return view('Admin.supports.index', compact('supports'));
    }

    public function create()
    {
        return view('Admin.supports.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title_ar' => 'required|string|max:255',
            'title_en' => 'required|string|max:255',
        ]);

        $support = Support::create($request->all());

        alert()->success(__('trans.addedSuccessfully'));

        return redirect()->back();
    }

    public function show($id)
    {
        $support = Support::where('id', $id)->firstorfail();

        return view('Admin.supports.show', compact('support'));
    }

    public function edit($id)
    {
        $support = Support::where('id', $id)->firstorfail();

        return view('Admin.supports.edit', compact('support'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title_ar' => 'required|string|max:255',
            'title_en' => 'required|string|max:255',
        ]);

        $support = Support::where('id', $id)->firstorfail();
        $support->update($request->all());

        alert()->success(__('trans.updatedSuccessfully'));

        return redirect()->back();
    }

    public function destroy($id)
    {
        $support = Support::where('id', $id)->delete();
    }

} //end of class

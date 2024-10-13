<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BasicController;
use App\Models\Skill;
use Illuminate\Http\Request;

class SkillController extends BasicController
{
    public function index(Request $request)
    {
        $models = Skill::paginate(50);

        return view('Admin.skills.index', compact('models'));
    }


    public function create()
    {
        return view('Admin.skills.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'title_ar' => 'required|string|max:255',
            'title_en' => 'required|string|max:255',
        ]);
        
        $model = Skill::create(array_merge($request->all()));

        alert()->success(__('trans.addedSuccessfully'));

        return redirect()->back();
    }


    public function show($id)
    {
        $model = Skill::where('id', $id)->firstorfail();

        return view('Admin.skills.show', compact('model'));
    }


    public function edit($id)
    {
        $model = Skill::where('id', $id)->firstorfail();

        return view('Admin.skills.edit', compact('model'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'title_ar' => 'required|string|max:255',
            'title_en' => 'required|string|max:255',
        ]);

        $model = Skill::where('id', $id)->firstorfail();

        $model->update($request->all());

        alert()->success(__('trans.updatedSuccessfully'));

        return redirect()->back();
    }


    public function destroy($id)
    {
        $model = Skill::where('id', $id)->delete();
    }


} //end of class

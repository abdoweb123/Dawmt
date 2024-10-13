<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BasicController;
use App\Http\Requests\Admin\JobRequest;
use App\Models\Job;
use App\Models\Skill;
use Illuminate\Http\Request;

class JobController extends BasicController
{
    public function index(Request $request)
    {
        $models = Job::paginate(50);

        return view('Admin.jobs.index', compact('models'));
    }


    public function create()
    {
        $skills = Skill::Active()->get();
        return view('Admin.jobs.create',compact('skills'));
    }


    public function store(JobRequest $request)
    {
        $model = Job::create($request->all());

        $model->skills()->sync($request->skills);

        alert()->success(__('trans.addedSuccessfully'));

        return redirect()->back();
    }


    public function show($id)
    {
        $model = Job::where('id', $id)->firstorfail();

        return view('Admin.jobs.show', compact('model'));
    }


    public function edit($id)
    {
        $model = Job::where('id', $id)->firstorfail();
        $skills = Skill::Active()->get();

        // Get the IDs of the features already linked to this Plan
        $selectedSkills = $model->skills->pluck('id')->toArray();

        return view('Admin.jobs.edit', compact('model','skills','selectedSkills'));
    }


    public function update(JobRequest $request, $id)
    {
        $model = Job::where('id', $id)->firstorfail();

        $model->update($request->all());

        $model->skills()->sync($request->skills);

        alert()->success(__('trans.updatedSuccessfully'));

        return redirect()->back();
    }


    public function destroy($id)
    {
        $model = Job::where('id', $id)->delete();
    }


} //end of class

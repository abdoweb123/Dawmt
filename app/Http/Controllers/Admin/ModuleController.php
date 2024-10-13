<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BasicController;
use App\Http\Requests\Client\ModuleRequest;
use App\Http\Services\Admin\ModuleService;
use App\Models\Module;
use App\Models\Support;
use Illuminate\Http\Request;


class ModuleController extends BasicController
{
    use ModuleService;

    public function index(Request $request)
    {
        $Modules = Module::paginate(50);

        return view('Admin.modules.index', compact('Modules'));
    }

    public function create()
    {
        $supports = Support::Active()->get();
        return view('Admin.modules.create',compact('supports'));
    }

    public function store(ModuleRequest $request)
    {
        // Create the Modules
        $module = Module::create($request->except('image'));

        $this->uploadImage($request,$module);

        $this->supports($request,$module);

        alert()->success(__('trans.addedSuccessfully'));

        return redirect()->back();
    }

    public function show($id)
    {
        $module = Module::where('id', $id)->firstorfail();

        return view('Admin.modules.show', compact('module'));
    }

    public function edit($id)
    {
        $supports = Support::Active()->get();

        $module = Module::where('id', $id)->firstorfail();

        return view('Admin.modules.edit', compact('module','supports'));
    }

    public function update(ModuleRequest $request, $id)
    {
        // Create the package
        $module = Module::where('id', $id)->firstorfail();

        $module->update($request->except('image'));

        $this->uploadImage($request,$module);

        // Attach items without detaching existing ones
        $this->supports($request,$module);

        alert()->success(__('trans.updatedSuccessfully'));

        return redirect()->back();
    }

    public function destroy($id)
    {
        $module = Module::where('id', $id)->delete();
    }
    
    
} //end of class

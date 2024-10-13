<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BasicController;
use App\Models\Branch;
use Illuminate\Http\Request;



class BranchController extends BasicController
{
    public function index(Request $request)
    {
        $Branchs = Branch::all();

        return view('Admin.branches.index', compact('Branchs'));
    }


    public function create()
    {
        return view('Admin.branches.create');
    }


    public function store(Request $request)
    {
        $Branch = Branch::create($request->all());
        alert()->success(__('trans.addedSuccessfully'));

        return redirect()->back();
    }


    public function show(Branch $Branch)
    {
        return view('Admin.branches.show', compact('Branch'));
    }


    public function edit($id)
    {
        $Branch = Branch::find($id);
        return view('Admin.branches.edit', compact('Branch'));
    }


    public function update(Branch $Branch, Request $request)
    {
        $Branch->update($request->all());

        alert()->success(__('trans.updatedSuccessfully'));

        return redirect()->back();
    }


    public function destroy($id)
    {
        $Branch = Branch::where('id', $id)->delete();
    }



} //end of class

<?php

namespace App\Http\Controllers\Admin;

use App\Functions\Upload;
use App\Http\Controllers\BasicController;
use Illuminate\Http\Request;
use App\Models\Faq;


class FaqController extends BasicController
{
    
    public function index(Request $request)
    {
        $Models = Faq::get();
        return view('Admin.faq.index', compact('Models'));
    }
    

    public function create()
    {
        $Models = Faq::get();

        return view('Admin.faq.create', compact('Models'));
    }
    

    public function store(Request $request)
    {
        $Model = Faq::create($request->all());
        $Model->save();
        alert()->success(__('trans.addedSuccessfully'));

        return redirect()->back();
    }
    

    public function show($id)
    {
        $faq = Faq::where('id', $id)->firstorfail();

        return view('Admin.faq.show', compact('faq'));
    }
    

    public function edit($id)
    {
        $Models = Faq::get();
        $Model = Faq::where('id', $id)->firstorfail();

        return view('Admin.faq.edit', compact('Model', 'Models'));
    }

    
    public function update(Request $request, $id)
    {
        $Model = Faq::where('id', $id)->firstorfail();
        $Model->update($request->all());
        $Model->save();
        alert()->success(__('trans.updatedSuccessfully'));

        return redirect()->back();
    }

    
    public function destroy($id)
    {
        $Model = Faq::where('id', $id)->delete();
    }


} //end of class

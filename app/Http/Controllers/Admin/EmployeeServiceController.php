<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BasicController;
use App\Models\EmployeeService;
use App\Models\Support;
use Illuminate\Http\Request;

class EmployeeServiceController extends BasicController
{
    public function index(Request $request)
    {
        $employeeServices = EmployeeService::paginate(50);

        return view('Admin.employeeService.index', compact('employeeServices'));
    }

    public function create()
    {
        return view('Admin.employeeService.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title_ar' => 'required|string|max:255',
            'title_en' => 'required|string|max:255',
        ]);

        $employeeService = EmployeeService::create($request->all());

        alert()->success(__('trans.addedSuccessfully'));

        return redirect()->back();
    }

    public function show($id)
    {
        $employeeService = EmployeeService::where('id', $id)->firstorfail();

        return view('Admin.employeeService.show', compact('employeeService'));
    }

    public function edit($id)
    {
        $employeeService = EmployeeService::where('id', $id)->firstorfail();

        return view('Admin.employeeService.edit', compact('employeeService'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title_ar' => 'required|string|max:255',
            'title_en' => 'required|string|max:255',
        ]);

        $employeeService = EmployeeService::where('id', $id)->firstorfail();
        $employeeService->update($request->all());

        alert()->success(__('trans.updatedSuccessfully'));

        return redirect()->back();
    }

    public function destroy($id)
    {
        $employeeService = EmployeeService::where('id', $id)->delete();
    }

} //end of class

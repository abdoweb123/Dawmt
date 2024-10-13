<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BasicController;
use App\Http\Requests\Client\ModuleRequest;
use App\Http\Requests\Client\StatisticRequest;
use App\Http\Services\Admin\ModuleService;
use App\Models\Statistic;
use App\Models\Support;
use Illuminate\Http\Request;


class StatisticsController extends BasicController
{
    use ModuleService;

    public function index(Request $request)
    {
        $statistics = Statistic::paginate(50);

        return view('Admin.statistics.index', compact('statistics'));
    }

    public function create()
    {
        $supports = Support::Active()->get();
        return view('Admin.statistics.create',compact('supports'));
    }

    public function store(StatisticRequest $request)
    {
        // Create the statistics
        $statistic = Statistic::create($request->all());

        alert()->success(__('trans.addedSuccessfully'));

        return redirect()->back();
    }

    public function show($id)
    {
        $statistic = Statistic::where('id', $id)->firstorfail();

        return view('Admin.statistics.show', compact('statistic'));
    }

    public function edit($id)
    {
        $statistic = Statistic::where('id', $id)->firstorfail();

        return view('Admin.statistics.edit', compact('statistic'));
    }

    public function update(StatisticRequest $request, $id)
    {
        // Create the package
        $statistic = Statistic::where('id', $id)->firstorfail();

        $statistic->update($request->all());
        
        alert()->success(__('trans.updatedSuccessfully'));

        return redirect()->back();
    }

    public function destroy($id)
    {
        $statistic = Statistic::where('id', $id)->delete();
    }
    
    
} //end of class

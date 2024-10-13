<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BasicController;
use App\Models\EmployeeService;
use App\Models\Feature;
use App\Models\Plan;
use App\Models\Support;
use Illuminate\Http\Request;

class PlanController extends BasicController
{
    public function index(Request $request)
    {
        $models = Plan::paginate(50);

        return view('Admin.plans.index', compact('models'));
    }

    
    public function create()
    {
        $features = Feature::query()->where('type','normal')->get();
        $advancedFeatures = Feature::query()->where('type','advanced')->get();

        return view('Admin.plans.create',compact('features','advancedFeatures'));
    }

    
    public function store(Request $request)
    {
        $request->validate([
            'title_ar' => 'required|string|max:255',
            'title_en' => 'required|string|max:255',
        ]);

        // Get the highest arrangement value from the 'plans' table and add 1
        $highestArrangement = Plan::max('arrangement');
        $newArrangement = $highestArrangement ? $highestArrangement + 1 : 1;

        // Create a new plan with the new arrangement value
        $model = Plan::create(array_merge($request->all(), ['arrangement' => $newArrangement]));

        // update features
        $this->updateFeatures($model, $request);

        alert()->success(__('trans.addedSuccessfully'));

        return redirect()->back();
    }

    
    public function show($id)
    {
        $model = Plan::where('id', $id)->firstorfail();

        return view('Admin.plans.show', compact('model'));
    }
    

    public function edit($id)
    {
        $model = Plan::where('id', $id)->firstorfail();
        $features = Feature::query()->where('type','normal')->get();
        $advancedFeatures = Feature::query()->where('type','advanced')->get();

        // Get the IDs of the features already linked to this Plan
        $selectedFeatures = $model->features->pluck('id')->toArray();

        return view('Admin.plans.edit', compact('model','features','advancedFeatures','selectedFeatures'));
    }
    

    public function update(Request $request, $id)
    {
        $request->validate([
            'title_ar' => 'required|string|max:255',
            'title_en' => 'required|string|max:255',
        ]);

        $model = Plan::where('id', $id)->firstorfail();
        $model->update($request->all());

        // update features
        $this->updateFeatures($model, $request);

        alert()->success(__('trans.updatedSuccessfully'));

        return redirect()->back();
    }


    public function destroy($id)
    {
        $model = Plan::where('id', $id)->delete();
    }


    // To update arrangement and most_popular
    public function update_plans_index(Request $request)
    {
        $plans = $request->input('plans');

        foreach ($plans as $plan) {
            Plan::where('id', $plan['id'])->update([
                'arrangement' => $plan['arrangement'],
                'most_popular' => $plan['most_popular'] == 'true' ? 1 : 0, // 1 for true, 0 for false
            ]);
        }

        return response()->json(['success' => true, 'message' => __('trans.updatedSuccessfully')]);

    }



    // store features and advanced features
    public function updateFeatures($model, $request)
    {
        // Merge features and advanced_features
        $allFeatures = array_merge($request->features ?? [], $request->advanced_features ?? []);

        // Sync the merged features with the model
        $model->features()->sync($allFeatures);
    }
    

} //end of class

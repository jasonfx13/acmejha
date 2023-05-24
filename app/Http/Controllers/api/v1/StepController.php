<?php

namespace App\Http\Controllers\api\v1;


use App\Http\Controllers\Controller;
use App\Http\Requests\V1\BulkStoreStepRequest;
use App\Http\Requests\V1\BulkUpdateSteps;
use App\Http\Requests\V1\StoreStepRequest;
use App\Http\Requests\V1\UpdateStepRequest;
use App\Http\Resources\V1\StepCollection;
use App\Http\Resources\V1\StepResource;
use App\Models\Step;
use App\Filters\V1\StepsFilter;
use Illuminate\Http\Request;

use Illuminate\Support\Arr;

class StepController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        $filter = new StepsFilter();
        $filterItems = $filter->transform($request); // [['column', 'operator', 'value']]
        $includeSteps = $request->query('includeSteps');
        $steps = Step::where($filterItems);

        if($includeSteps) {
            $steps = Step::with(['hazards', 'safeguards']);
        }
//        $steps = Step::with(['hazards', 'safeguards']);
        return new StepCollection($steps->paginate(100)->appends($request->query()));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreStepRequest $request)
    {
        //
        return new StepResource(Step::create($request->all()));
    }


    public function bulkStore(BulkStoreStepRequest $request) {
        $bulk = collect($request->all())->map(function($arr, $key) {
            return Arr::except($arr, ['jobId']);
        });

        Step::insert($bulk->toArray());

        return $bulk;
    }

    public function bulkPatch(BulkUpdateSteps $request) {
        $bulk = collect($request->all())->map(function($arr, $key) {
            return Arr::except($arr, ['jobId']);
        });

        Step::insert($bulk->toArray());
    }

    /**
     * Display the specified resource.
     */
    public function show(Step $step)
    {
        //
        return new StepResource($step);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Step $step)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateStepRequest $request, Step $step)
    {
        //
        $step->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Step $step)
    {
        //
        $step->delete();
    }
}

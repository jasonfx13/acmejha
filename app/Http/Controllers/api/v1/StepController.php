<?php

namespace App\Http\Controllers\api\v1;

use App\Filters\V1\StepsFilter;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreStepRequest;
use App\Http\Requests\UpdateStepRequest;
use App\Http\Resources\V1\StepCollection;
use App\Http\Resources\V1\StepResource;
use App\Models\Step;
use Illuminate\Http\Request;

class StepController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        $filter = new StepsFilter();
        $queryItems = $filter->transform($request); // [['column', 'operator', 'value']]


        if(count($queryItems) == 0) {
            return new StepCollection(Step::all());
        } else {
            $steps = Step::where($queryItems)->all();
            return new StepCollection($steps->appends($request->query()));
        }


//        return new StepCollection(Job::paginate());
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
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Step $step)
    {
        //
    }
}

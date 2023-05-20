<?php

namespace App\Http\Controllers\api\v1;

use App\Filters\V1\HazardsFilter;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreHazardRequest;
use App\Http\Requests\UpdateHazardRequest;
use App\Http\Resources\V1\HazardCollection;
use App\Http\Resources\V1\HazardResource;
use App\Models\Hazard;
use Illuminate\Http\Request;

class HazardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        $filter = new HazardsFilter();
        $filterItems = $filter->transform($request); // [['column', 'operator', 'value']]


        // $includeSteps = $request->query('includeSteps');

        $hazards = Hazard::where($filterItems)->with('safeguards');

        //if($includeSteps) {
           // $hazards = $hazards->with('safeguards');
       // }

        return new HazardCollection($hazards->paginate()->appends($request->query()));

//        if(count($queryItems) == 0) {
//            return new HazardCollection(Hazard::all());
//        } else {
//            $hazards = Hazard::where($queryItems)->all();
//            return new HazardCollection($hazards->appends($request->query()));
//        }


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
    public function store(StoreHazardRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Hazard $hazard)
    {
        //
        return new HazardResource($hazard);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Hazard $hazard)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateHazardRequest $request, Hazard $hazard)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Hazard $hazard)
    {
        //
    }
}

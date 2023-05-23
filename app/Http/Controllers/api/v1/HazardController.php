<?php

namespace App\Http\Controllers\api\v1;

use App\Filters\V1\HazardsFilter;
use App\Http\Controllers\Controller;
use App\Http\Requests\V1\BulkStoreHazards;
use App\Http\Requests\V1\StoreHazardRequest;
use App\Http\Requests\V1\UpdateHazardRequest;
use App\Http\Resources\V1\HazardCollection;
use App\Http\Resources\V1\HazardResource;
use App\Models\Hazard;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

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

        $hazards = Hazard::with('safeguards');

        return new HazardCollection($hazards->paginate()->appends($request->query()));
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
        return new HazardResource(Hazard::create($request->all()));
    }

    public function bulkStore(BulkStoreHazards $request) {
        $bulk = collect($request->all())->map(function($arr, $key) {
            return Arr::except($arr, ['stepId']);
        });

        Hazard::insert($bulk->toArray());

        return $bulk;
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
        $hazard->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Hazard $hazard)
    {
        //
        $hazard->delete();
    }
}

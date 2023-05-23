<?php

namespace App\Http\Controllers\api\v1;

use App\Filters\V1\SafeguardsFilter;
use App\Http\Controllers\Controller;
use App\Http\Requests\V1\BulkStoreSafeguards;
use App\Http\Requests\V1\StoreSafeguardRequest;
use App\Http\Requests\V1\UpdateSafeguardRequest;
use App\Http\Resources\V1\SafeguardCollection;
use App\Http\Resources\V1\SafeguardResource;
use App\Models\Safeguard;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class SafeguardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        $filter = new SafeguardsFilter();
        $filterItems = $filter->transform($request); // [['column', 'operator', 'value']]
        $safeguards = Safeguard::where($filterItems);
        return new SafeguardCollection($safeguards->paginate(100)->appends($request->query()));
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
    public function store(StoreSafeguardRequest $request)
    {
        return new SafeguardResource(Safeguard::create($request->all()));
    }

    public function bulkStore(BulkStoreSafeguards $request) {
        $bulk = collect($request->all())->map(function($arr, $key) {
            return Arr::except($arr, ['hazardId']);
        });

        Safeguard::insert($bulk->toArray());

        return $bulk;
    }

    /**
     * Display the specified resource.
     */
    public function show(Safeguard $safeguard)
    {
        //
        return new SafeguardResource($safeguard);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Safeguard $safeguard)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSafeguardRequest $request, Safeguard $safeguard)
    {
        //
        $safeguard->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Safeguard $safeguard)
    {
        //
        $safeguard->delete();
    }
}

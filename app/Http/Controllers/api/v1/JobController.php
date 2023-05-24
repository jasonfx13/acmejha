<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\V1\StoreJobRequest;
use App\Http\Requests\V1\UpdateJobRequest;
use App\Http\Resources\V1\JobCollection;
use App\Http\Resources\V1\JobResource;
use App\Models\Job;
use App\Filters\V1\JobsFilter;
use Illuminate\Http\Request;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        $filter = new JobsFilter();
        $filterItems = $filter->transform($request); // [['column', 'operator', 'value']]
        $includeSteps = $request->query('includeSteps');
        $jobs = Job::where($filterItems);

        if($includeSteps) {
            $jobs = Job::with(['steps', 'hazards', 'safeguards']);
        }

        return new JobCollection($jobs->paginate()->appends($request->query()));

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
    public function store(StoreJobRequest $request)
    {
        //
        return new JobResource(Job::create($request->all()));
    }

    /**
     * Display the specified resource.
     */
    public function show(Job $job)
    {
        //
        $includeSteps = request()->query('includeSteps');

        if($includeSteps) {
            return new JobResource($job->loadMissing('steps'));
        }
        return new JobResource($job);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Job $job)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateJobRequest $request, Job $job)
    {
        $job->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Job $job)
    {


        $job->delete();
    }
}

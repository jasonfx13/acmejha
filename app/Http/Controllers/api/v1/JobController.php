<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreJobRequest;
use App\Http\Requests\UpdateJobRequest;
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
            $jobs = $jobs->with('steps');
        }

        return new JobCollection($jobs->paginate()->appends($request->query()));

//        if(count($filterItems) == 0) {
//            return new JobCollection(Job::paginate());
//        } else {
//            $jobs = Job::where($filterItems)->paginate();
//            return new JobCollection($jobs->appends($request->query()));
//        }


//        return new JobCollection(Job::paginate());
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Job $job)
    {
        //
    }
}

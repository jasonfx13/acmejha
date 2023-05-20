<?php

namespace App\Filters\V1;

use Illuminate\Http\Request;
use App\Filters\ApiFilter;

class StepsFilter extends ApiFilter {
    protected $allowedParams = [
        'title' => ['eq'],
        'jobId' => ['eq'],
        'createdDate' => ['eq', 'gt', 'lt']
    ];

    protected $columnMap = [
        'createdDate' => 'created_at',
        'jobId' => 'job_id'
    ];

    protected $operatorMap = [
        'eq' => '=',
        'lt' => '<',
        'gt' => '>'
    ];
}

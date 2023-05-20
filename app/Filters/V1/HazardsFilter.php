<?php

namespace App\Filters\V1;

use Illuminate\Http\Request;
use App\Filters\ApiFilter;

class HazardsFilter extends ApiFilter {
    protected $allowedParams = [
        'title' => ['eq'],
        'stepId' => ['eq'],
        'createdDate' => ['eq', 'gt', 'lt']
    ];

    protected $columnMap = [
        'createdDate' => 'created_at',
        'stepId' => 'step_id'
    ];

    protected $operatorMap = [
        'eq' => '=',
        'lt' => '<',
        'gt' => '>'
    ];
}

<?php

namespace App\Filters\V1;

use Illuminate\Http\Request;
use App\Filters\ApiFilter;

class JobsFilter extends ApiFilter {
    protected $allowedParams = [
        'title' => ['eq'],
        'enteredBy' => ['eq'],
        'createdDate' => ['eq', 'gt', 'lt']
    ];

    protected $columnMap = [
        'createdDate' => 'created_at',
        'enteredBy' => 'author'
    ];

    protected $operatorMap = [
        'eq' => '=',
        'lt' => '<',
        'gt' => '>'
    ];
}

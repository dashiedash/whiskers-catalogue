<?php

namespace App\Filters\v010;

use App\Filters\ApiFilter;
use Illuminate\Http\Request;

class BookFilters extends ApiFilter
{
    protected $safeParams = [
        'authorLastName' => ['eq'],
        'authorFirstName' => ['eq'],
        'publishYear' => ['eq', 'gt', 'gte', 'lt', 'lte'],
        'title' => ['eq'],
        'publisher' => ['eq'],
        'genre' => ['eq'],
    ];

    protected $columnMap = [
        'authorLastName' => 'author_last_name',
        'authorFirstName' => 'author_first_name',
        'publishYear' => 'publish_year',
    ];

    protected $operatorMap = [
        'eq' => '=',
        'lt' => '<',
        'lte' => '≤',
        'gt' => '>',
        'gte' => '≥',
    ];
}

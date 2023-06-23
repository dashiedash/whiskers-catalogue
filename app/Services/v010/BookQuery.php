<?php

namespace App\Services\v010;

use Illuminate\Http\Request;

class BookQuery
{
    protected $safeParams = [
        'authorLastName' => ['eq'],
        'authorFirstName' => ['eq'],
        'publishYear' => ['eq', 'gt', 'gte', 'lt', 'lte'],
        'title' => ['eq'],
        'publisher' => ['eq'],
        'genre' => ['eq'],
    ];

    protected $columnMap = [];

    protected $operatorMap = [
        'eq' => '=',
        'lt' => '<',
        'lte' => '≤',
        'gt' => '>',
        'gte' => '≥',
    ];

    public function transform(Request $request)
    {
        $eloQuery = [];

        foreach ($this->safeParams as $parm => $operators) {
            $query = $request->query($parm);

            if (!isset($query)) {
                continue;
            }

            $column = $this->columnMap[$parm] ?? $parm;

            foreach ($operators as $operator) {
                if (isset($query[$operator])) {
                    $eloQuery[] = [$column, $this->operatorMap[$operator], $query[$operator]];
                }
            }
        }

        return $eloQuery;
    }
}

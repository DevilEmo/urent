<?php

// ProductFilter.php

namespace App\Filters;

use App\Filters\AbstractFilter;
use Illuminate\Database\Eloquent\Builder;

class PostFilter extends AbstractFilter
{
    protected $filters = [
        'bed_no' => Bed_noFilter::class,
        'bathroom_no' => Bathroom_noFilter::class,
        'unit_type' => Unit_typeFilter::class,
        'location' => LocationFilter::class,
    ];
}
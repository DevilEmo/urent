<?php

// TypeFilter.php

namespace App\Filters;

class Bathroom_noFilter
{
    public function filter($builder, $value)
    {
        return $builder->where('bathroom_no', $value);
    }
}
<?php

// TypeFilter.php

namespace App\Filters;

class Bed_noFilter
{
    public function filter($builder, $value)
    {
        return $builder->where('bed_no', $value);
    }
}
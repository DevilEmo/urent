<?php

// TypeFilter.php

namespace App\Filters;

class Unit_typeFilter
{
    public function filter($builder, $value)
    {
        return $builder->where('unit_type', $value);
    }
}
<?php

namespace App\Enum\TodoTask;

enum Filter: string
{
    case PRIORITY_MIN = 'priority_min';
    case PRIORITY_MAX = 'priority_max';
    case CREATED_AT_MIN = 'created_at_min';
    case CREATED_AT_MAX = 'created_at_max';
    case UPDATED_AT_MIN = 'updated_at_min';
    case UPDATED_AT_MAX = 'updated_at_max';
}

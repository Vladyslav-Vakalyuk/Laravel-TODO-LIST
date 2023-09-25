<?php

namespace App\Enum\TodoTask;

enum Status: int
{
    case NOT_COMPLETED = 0;
    case COMPLETED = 1;
}

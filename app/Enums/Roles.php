<?php

namespace App\Enums;

enum Roles: int
{
    case Admin = 1;
    case User = 2;
    case Manager = 3;
}

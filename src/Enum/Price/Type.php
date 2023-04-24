<?php

declare(strict_types=1);

namespace Dyrynda\AmberElectric\Enum\Price;

use ArchTech\Enums\From;

enum Type
{
    use From;

    case ActualInterval;

    case CurrentInterval;

    case ForecastInterval;
}

<?php

declare(strict_types=1);

namespace Dyrynda\AmberElectric\Enum\Renewables;

use ArchTech\Enums\From;

enum Type
{
    use From;

    case ActualRenewable;

    case CurrentRenewable;

    case ForecastRenewable;
}

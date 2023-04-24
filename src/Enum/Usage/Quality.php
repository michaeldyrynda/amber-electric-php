<?php

declare(strict_types=1);

namespace Dyrynda\AmberElectric\Enum\Usage;

enum Quality: string
{
    case Billable = 'billable';

    case Estimated = 'estimated';
}

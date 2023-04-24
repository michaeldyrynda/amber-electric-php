<?php

declare(strict_types=1);

namespace Dyrynda\AmberElectric\Enum;

use ArchTech\Enums\From;

enum SpikeStatus: string
{
    use From;

    case None = 'none';

    case Potential = 'potential';

    case Spike = 'spike';
}

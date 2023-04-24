<?php

declare(strict_types=1);

namespace Dyrynda\AmberElectric\Enum\Price;

use ArchTech\Enums\From;

enum Descriptor: string
{
    use From;

    case ExtremelyLow = 'extremelyLow';

    case High = 'high';

    case Low = 'low';

    case Negative = 'negative';

    case Neutral = 'neutral';

    case Spike = 'spike';

    case VeryLow = 'veryLow';
}

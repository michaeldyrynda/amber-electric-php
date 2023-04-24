<?php

declare(strict_types=1);

namespace Dyrynda\AmberElectric\Enum\Tariff;

enum Period: string
{
    case OffPeak = 'offPeak';

    case Peak = 'peak';

    case Shoulder = 'shoulder';

    case SolarSponge = 'solarSponge';
}

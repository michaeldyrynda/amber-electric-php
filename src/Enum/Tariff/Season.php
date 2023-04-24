<?php

declare(strict_types=1);

namespace Dyrynda\AmberElectric\Enum\Tariff;

enum Season: string
{
    case Autumn = 'autumn';

    case Default = 'default';

    case Holiday = 'holiday';

    case NonSummer = 'nonSummer';

    case Spring = 'spring';

    case Summer = 'summer';

    case Weekday = 'weekday';

    case Weekend = 'weekend';

    case WeekendHoliday = 'weekendHoliday';

    case Winter = 'winter';
}

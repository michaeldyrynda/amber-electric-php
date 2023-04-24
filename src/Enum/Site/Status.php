<?php

declare(strict_types=1);

namespace Dyrynda\AmberElectric\Enum\Site;

use ArchTech\Enums\From;

enum Status: string
{
    use From;

    case Active = 'active';

    case Closed = 'closed';

    case Pending = 'pending';
}

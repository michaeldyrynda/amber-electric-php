<?php

declare(strict_types=1);

namespace Dyrynda\AmberElectric\Enum\Channel;

use ArchTech\Enums\From;

enum Type: string
{
    use From;

    case ControlledLoad = 'controlledLoad';

    case FeedIn = 'feedIn';

    case General = 'general';
}

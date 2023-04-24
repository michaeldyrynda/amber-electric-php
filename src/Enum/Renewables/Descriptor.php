<?php

declare(strict_types=1);

namespace Dyrynda\AmberElectric\Enum\Renewables;

use ArchTech\Enums\From;

enum Descriptor: string
{
    use From;

    case Best = 'best';

    case Great = 'great';

    case NotGreat = 'notGreat';

    case Ok = 'ok';

    case Worst = 'worst';
}

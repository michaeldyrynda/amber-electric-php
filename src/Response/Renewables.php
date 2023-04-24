<?php

declare(strict_types=1);

namespace Dyrynda\AmberElectric\Response;

use Carbon\CarbonImmutable;
use Dyrynda\AmberElectric\Enum\Renewables\Descriptor;
use Dyrynda\AmberElectric\Enum\Renewables\Type;

final readonly class Renewables
{
    private function __construct(
        public Type $type,
        public int $duration,
        public CarbonImmutable $date,
        public CarbonImmutable $nemTime,
        public CarbonImmutable $startTime,
        public CarbonImmutable $endTime,
        public int $renewables,
        public ?Descriptor $descriptor
    ) {
    }

    public static function fromResponse(array $response): self
    {
        return new self(
            type: Type::fromName($response['type']),
            duration: (int) $response['duration'],
            date: CarbonImmutable::parse($response['date']),
            nemTime: CarbonImmutable::parse($response['nemTime']),
            startTime: CarbonImmutable::parse($response['startTime']),
            endTime: CarbonImmutable::parse($response['endTime']),
            renewables: (int) $response['renewables'],
            descriptor: Descriptor::tryFrom($response['descriptor']),
        );
    }
}

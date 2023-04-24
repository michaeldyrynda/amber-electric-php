<?php

declare(strict_types=1);

namespace Dyrynda\AmberElectric\Response\Price;

final readonly class Range
{
    private function __construct(
        public float $max,
        public float $min
    ) {
    }

    public static function fromResponse(array $response): self
    {
        return new self(
            max: (float) $response['max'],
            min: (float) $response['min']
        );
    }
}

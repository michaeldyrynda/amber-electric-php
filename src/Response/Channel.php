<?php

declare(strict_types=1);

namespace Dyrynda\AmberElectric\Response;

use Dyrynda\AmberElectric\Enum\Channel\Type;

final readonly class Channel
{
    private function __construct(
        public string $identifier,
        public Type $type,
        public string $tariff
    ) {
    }

    public static function fromResponse(array $response): self
    {
        return new self(
            identifier: $response['identifier'],
            type: Type::from($response['type']),
            tariff: $response['tariff']
        );
    }
}

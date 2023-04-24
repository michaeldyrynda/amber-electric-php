<?php

declare(strict_types=1);

namespace Dyrynda\AmberElectric\Response;

use Dyrynda\AmberElectric\Enum\Tariff\Period;
use Dyrynda\AmberElectric\Enum\Tariff\Season;

final readonly class TariffInformation
{
    private function __construct(
        public ?Period $period,
        public ?Season $season,
        public ?int $block,
        public ?bool $demandWindow
    ) {
    }

    public static function fromResponse(array $response): self
    {
        return new self(
            period: Period::tryFrom($response['period'] ?? '') ?: null,
            season: Season::tryFrom($response['season'] ?? '') ?: null,
            block: $response['block'] ?? null,
            demandWindow: $response['demandWindow'] ?? null
        );
    }
}

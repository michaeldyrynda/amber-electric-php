<?php

declare(strict_types=1);

namespace Dyrynda\AmberElectric\Response;

use Carbon\CarbonImmutable;
use Dyrynda\AmberElectric\Enum\Site\Status;

final readonly class Site
{
    /**
     * @param  \Dyrynda\AmberElectric\Response\Channel[]  $channels
     */
    private function __construct(
        public string $id,
        public string $nmi,
        public array $channels,
        public string $network,
        public Status $status,
        public ?CarbonImmutable $activeFrom,
        public ?CarbonImmutable $closedOn
    ) {
    }

    public static function fromResponse(array $response): self
    {
        return new self(
            id: $response['id'],
            nmi: $response['nmi'],
            channels: array_map(static fn ($channel) => Channel::fromResponse($channel), $response['channels']),
            network: $response['network'],
            status: Status::from($response['status']),
            activeFrom: isset($response['activeFrom']) ? CarbonImmutable::parse($response['activeFrom']) : null,
            closedOn: isset($response['closedOn']) ? CarbonImmutable::parse($response['closedOn']) : null
);
    }
}

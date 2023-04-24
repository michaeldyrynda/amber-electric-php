<?php

declare(strict_types=1);

namespace Dyrynda\AmberElectric\Response;

use Carbon\CarbonImmutable;
use Dyrynda\AmberElectric\Enum\Channel\Type;
use Dyrynda\AmberElectric\Enum\SpikeStatus;
use Dyrynda\AmberElectric\Enum\Usage\Descriptor;
use Dyrynda\AmberElectric\Enum\Usage\Quality;
use Dyrynda\AmberElectric\Enum\UsageType;

final readonly class Usage
{
    private function __construct(
        public UsageType $type,
        public int $duration,
        public float $spotPerKwh,
        public float $perKwh,
        public CarbonImmutable $date,
        public CarbonImmutable $nemTime,
        public CarbonImmutable $startTime,
        public CarbonImmutable $endTime,
        public int $renewables,
        public Type $channelType,
        public ?TariffInformation $tariffInformation,
        public SpikeStatus $spikeStatus,
        public ?Descriptor $descriptor,
        public ?string $channelIdentifier,
        public float $kwh,
        public Quality $quality,
        public float $cost
    ) {
    }

    public static function fromResponse(array $response): self
    {
        return new self(
            type: UsageType::fromName($response['type']),
            duration: (int) $response['duration'],
            spotPerKwh: (float) $response['spotPerKwh'],
            perKwh: (float) $response['perKwh'],
            date: CarbonImmutable::parse($response['date']),
            nemTime: CarbonImmutable::parse($response['nemTime']),
            startTime: CarbonImmutable::parse($response['startTime']),
            endTime: CarbonImmutable::parse($response['endTime']),
            renewables: (int) $response['renewables'],
            channelType: Type::from($response['channelType']),
            tariffInformation: isset($response['tariffInformation'])
                ? TariffInformation::fromResponse($response['tariffInformation'])
                : null,
            spikeStatus: SpikeStatus::from($response['spikeStatus']),
            descriptor: Descriptor::tryFrom($response['descriptor']),
            channelIdentifier: $response['channelIdentifier'] ?? null,
            kwh: (float) $response['kwh'],
            quality: Quality::from($response['quality']),
            cost: (float) $response['cost']
        );
    }
}

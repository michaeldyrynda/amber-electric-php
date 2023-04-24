<?php

declare(strict_types=1);

namespace Dyrynda\AmberElectric\Response;

use Carbon\CarbonImmutable;
use Dyrynda\AmberElectric\Enum\Channel\Type as ChannelType;
use Dyrynda\AmberElectric\Enum\Price\Descriptor;
use Dyrynda\AmberElectric\Enum\Price\Type as PriceType;
use Dyrynda\AmberElectric\Enum\SpikeStatus;
use Dyrynda\AmberElectric\Response\Price\Range;

final readonly class Price
{
    private function __construct(
        public PriceType $type,
        public int $duration,
        public float $spotPerKwh,
        public float $perKwh,
        public CarbonImmutable $date,
        public CarbonImmutable $nemTime,
        public CarbonImmutable $startTime,
        public CarbonImmutable $endTime,
        public int $renewables,
        public ChannelType $channelType,
        public ?TariffInformation $tariffInformation,
        public SpikeStatus $spikeStatus,
        public ?Descriptor $descriptor,
        public ?Range $range
    ) {
    }

    public static function fromResponse(array $response): self
    {
        return new self(
            type: PriceType::fromName($response['type']),
            duration: (int) $response['duration'],
            spotPerKwh: (float) $response['spotPerKwh'],
            perKwh: (float) $response['perKwh'],
            date: CarbonImmutable::parse($response['date']),
            nemTime: CarbonImmutable::parse($response['nemTime']),
            startTime: CarbonImmutable::parse($response['startTime']),
            endTime: CarbonImmutable::parse($response['endTime']),
            renewables: (int) $response['renewables'],
            channelType: ChannelType::from($response['channelType']),
            tariffInformation: isset($response['tariffInformation'])
                ? TariffInformation::fromResponse($response['tariffInformation'])
                : null,
            spikeStatus: SpikeStatus::from($response['spikeStatus']),
            descriptor: Descriptor::tryFrom($response['descriptor']),
            range: isset($response['range']) ? Range::fromResponse($response['range']) : null
        );
    }
}

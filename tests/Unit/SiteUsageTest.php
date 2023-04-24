<?php

use Carbon\CarbonImmutable;
use Dyrynda\AmberElectric\AmberElectric;
use Dyrynda\AmberElectric\Enum\Channel\Type;
use Dyrynda\AmberElectric\Enum\SpikeStatus;
use Dyrynda\AmberElectric\Enum\Tariff\Period;
use Dyrynda\AmberElectric\Enum\Tariff\Season;
use Dyrynda\AmberElectric\Enum\Usage\Descriptor;
use Dyrynda\AmberElectric\Enum\Usage\Quality;
use Dyrynda\AmberElectric\Enum\UsageType;
use Dyrynda\AmberElectric\Response\SiteUsage;

it('returns an array of site usage', function () {
    $client = new AmberElectric('testtoken');
    $client->withMockClient(mockClient());

    $response = $client->sites()->usage(
        '01F5A5CRKMZ5BCX9P1S4V990AM',
        CarbonImmutable::today(),
        CarbonImmutable::today(),
    );

    expect($response)->toBeInstanceOf(SiteUsage::class);

    expect($response->usage[0])
        ->type->toBe(UsageType::Usage)
        ->duration->toBe(5)
        ->spotPerKwh->toBe(6.12)
        ->perKwh->toBe(24.33)
        ->date->toEqual(CarbonImmutable::parse('2021-05-05'))
        ->nemTime->toEqual(CarbonImmutable::parse('2021-05-06T12:30:00+10:00'))
        ->startTime->toEqual(CarbonImmutable::parse('2021-05-05T02:00:01Z'))
        ->endTime->toEqual(CarbonImmutable::parse('2021-05-05T02:30:00Z'))
        ->renewables->toBe(45)
        ->channelType->toBe(Type::General)
        ->tariffInformation->period->toBe(Period::OffPeak)
        ->tariffInformation->season->toBe(Season::Default)
        ->tariffInformation->block->toBe(2)
        ->tariffInformation->demandWindow->toBe(true)
        ->spikeStatus->toBe(SpikeStatus::None)
        ->descriptor->toBe(Descriptor::Negative)
        ->channelIdentifier->toBe('E1')
        ->kwh->toBe(0.0)
        ->quality->toBe(Quality::Estimated)
        ->cost->toBe(0.0);
});

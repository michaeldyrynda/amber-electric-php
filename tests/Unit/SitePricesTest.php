<?php

use Carbon\CarbonImmutable;
use Dyrynda\AmberElectric\AmberElectric;
use Dyrynda\AmberElectric\Enum\Channel\Type as ChannelType;
use Dyrynda\AmberElectric\Enum\Price\Descriptor;
use Dyrynda\AmberElectric\Enum\Price\Type;
use Dyrynda\AmberElectric\Enum\SpikeStatus;
use Dyrynda\AmberElectric\Enum\Tariff\Period;
use Dyrynda\AmberElectric\Enum\Tariff\Season;
use Dyrynda\AmberElectric\Response\SitePrice;

it('returns an array of sites', function () {
    $client = new AmberElectric('testtoken');
    $client->withMockClient(mockClient());

    $response = $client->sites()->prices('01F5A5CRKMZ5BCX9P1S4V990AM');

    expect($response)->toBeInstanceOf(SitePrice::class);

    expect($response->prices[0])
        ->type->toBe(Type::ActualInterval)
        ->duration->toBe(5)
        ->spotPerKwh->toBe(6.12)
        ->perKwh->toBe(24.33)
        ->date->toEqual(CarbonImmutable::parse('2021-05-05'))
        ->nemTime->toEqual(CarbonImmutable::parse('2021-05-06T12:30:00+10:00'))
        ->startTime->toEqual(CarbonImmutable::parse('2021-05-05T02:00:01Z'))
        ->endTime->toEqual(CarbonImmutable::parse('2021-05-05T02:30:00Z'))
        ->renewables->toBe(45)
        ->channelType->toBe(ChannelType::General)
        ->tariffInformation->period->toBe(Period::OffPeak)
        ->tariffInformation->season->toBe(Season::Default)
        ->tariffInformation->block->toBe(2)
        ->tariffInformation->demandWindow->toBeTrue()
        ->spikeStatus->toBe(SpikeStatus::None)
        ->descriptor->toBe(Descriptor::Negative)
        ->range->toBeNull();
});

<?php

use Carbon\CarbonImmutable;
use Dyrynda\AmberElectric\AmberElectric;
use Dyrynda\AmberElectric\Enum\Renewables\Descriptor;
use Dyrynda\AmberElectric\Enum\Renewables\Type;
use Dyrynda\AmberElectric\Enum\State;
use Dyrynda\AmberElectric\Response\CurrentRenewables;

it('returns state renewable details', function () {
    $client = new AmberElectric('testtoken');
    $client->withMockClient(mockClient());

    $response = $client->renewables()->current(State::SA);

    expect($response)->toBeInstanceOf(CurrentRenewables::class);

    expect($response->renewables[0])
        ->type->toBe(Type::ActualRenewable)
        ->duration->toBe(5)
        ->date->toEqual(CarbonImmutable::parse('2021-05-05'))
        ->nemTime->toEqual(CarbonImmutable::parse('2021-05-06T12:30:00+10:00'))
        ->startTime->toEqual(CarbonImmutable::parse('2021-05-05T02:00:01Z'))
        ->endTime->toEqual(CarbonImmutable::parse('2021-05-05T02:30:00Z'))
        ->renewables->toBe(45)
        ->descriptor->toBe(Descriptor::Best);
});

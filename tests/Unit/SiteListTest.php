<?php

use Carbon\CarbonImmutable;
use Dyrynda\AmberElectric\AmberElectric;
use Dyrynda\AmberElectric\Enum\Site\Status;
use Dyrynda\AmberElectric\Response\Channel;
use Dyrynda\AmberElectric\Response\SiteList;

it('returns an array of sites', function () {
    $client = new AmberElectric('testtoken');
    $client->withMockClient(mockClient());

    $response = $client->sites()->all();

    expect($response)->toBeInstanceOf(SiteList::class);

    expect($response->sites[0])
        ->id->toBe('01F5A5CRKMZ5BCX9P1S4V990AM')
        ->nmi->toBe('3052282872')
        ->channels->toContainOnlyInstancesOf(Channel::class)
        ->network->toBe('Jemena')
        ->status->toBe(Status::Active)
        ->activeFrom->toEqual(CarbonImmutable::parse('2022-01-01'))
        ->closedOn->toEqual(CarbonImmutable::parse('2022-05-01'));
});
